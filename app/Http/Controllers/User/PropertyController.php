<?php

namespace App\Http\Controllers\User;

use PDO;
use App\Models\City;
use App\Models\Plan;
use App\Models\Frontend;
use App\Models\Property;
use App\Models\PropertyInfo;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PlanSubscribe;
use App\Models\PropertyImage;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Wishlist;

class PropertyController extends Controller {
    public function index() {
        $pageTitle = "Add new Funding";
        $cities = City::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();

        return view($this->activeTemplate . 'property.create', compact('pageTitle', 'cities', 'propertyTypes'));
    }

    public function listProperty() {
        $pageTitle = "Investment";
        $properties = Property::where('user_id', auth()->user()->id)->latest()->with('location', 'city', 'propertyInfo', 'propertyImage')->paginate(getPaginate(20));

        return view($this->activeTemplate . 'property.list', compact('properties', 'pageTitle'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'email' => 'nullable|email|max:60',
            'phone' => 'nullable|max:40',
            'aminities.*' => 'required',
            'type' => 'required|in:1,2',
            'floor_plan' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'images.*' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $user = auth()->user();
        $subscribe = PlanSubscribe::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        $plan = Plan::find(@$subscribe->plan_id);

        $propertyCount = Property::where('user_id', auth()->user()->id)->whereMonth('created_at', now()->month)->count();

        if($plan){
            if( $propertyCount >= $plan->listing_limit && $subscribe->expire_date < now()){
                $notify[] = ['error', 'Opps! Your limit is over. Please subscribe to a plan.'];
                return back()->withNotify($notify);
            }
        }else{
            $notify[] = ['error', 'Opps! Your limit is over. Please subscribe to a plan.'];
            return back()->withNotify($notify);
        }


        $property = new Property();
        $property->title = $request->title;
        $property->user_id = $user->id;
        $property->property_type = $request->property_type;
        $property->city_id = $request->city;
        $property->location_id = $request->location;
        $property->video_link = $request->video_link;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $property->type = $request->type;
        $property->status = 1;
        $property->save();


        $purifier = new \HTMLPurifier();

        $propertyInfo = new PropertyInfo();
        $propertyInfo->property_id = $property->id;
        $propertyInfo->room = $request->room;
        $propertyInfo->kitchen = $request->kitchen;
        $propertyInfo->bathroom = $request->bathroom;
        $propertyInfo->unit = $request->unit;
        $propertyInfo->floor = $request->floor;
        $propertyInfo->square_feet = $request->square_feet;
        $propertyInfo->price = $request->price;
        $propertyInfo->latitude = $request->latitude;
        $propertyInfo->longitude = $request->longitude;
        $propertyInfo->description = $purifier->purify($request->description);

        if($request->aminities){
            $propertyInfo->aminity = json_encode($request->aminities);
        }

        if($request->hasFile('floor_plan')){
            $propertyInfo->floor_plan = fileUploader($request->floor_plan, getFilePath('property'));
        }

        $propertyInfo->save();

       if($request->images){
            foreach ($request->images as $image) {
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                try {
                    $propertyImage->image = fileUploader($image, getFilePath('property'), getFileSize('property'));
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Couldn\'t upload your image'];
                    return back()->withNotify($notify);
                }
                $propertyImage->save();
            }
        }


        $notify[] = ['success', 'Property has been created'];
        return back()->withNotify($notify);

    }

    public function edit($id) {

        $pageTitle = 'Edit Funding';
        $cities = City::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        $property = Property::findOrFail($id);
        $propertyInfo = PropertyInfo::where('property_id', $id)->firstOrFail();
        $propertyImage = PropertyImage::where('property_id', $id)->get();

        return view($this->activeTemplate . 'property.edit', compact('property', 'propertyInfo', 'propertyImage', 'cities', 'propertyTypes', 'pageTitle'));

    }

    public function imageRemove(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        $image = PropertyImage::findOrFail($request->id);
        $path = getFilePath('property');
        fileManager()->removeFile($path . '/' . $image->image);
        $image->delete();
        $notify[] = ['success', 'Image has been deleted'];
        return back()->withNotify($notify);

    }


    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'email' => 'nullable|email|max:60',
            'phone' => 'nullable|max:40',
            'aminities.*' => 'required',
            'type' => 'required|in:1,2',
            'floor_plan' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'images.*' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $userId =  auth()->user()->id;
        $property = Property::findOrFail($id);
        if($property->user_id != auth()->user()->id){
            $notify[] = ['error', 'You are not allowed to update this property.'];
            return back()->withNotify($notify);
        }
        $property->title = $request->title;
        $property->property_type = $request->property_type;
        $property->city_id = $request->city;
        $property->location_id = $request->location;
        $property->video_link = $request->video_link;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $property->type = $request->type;
        $property->status = $request->status ? 1 : 0;
        $property->save();

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                try {
                    $propertyImage->image = fileUploader($image, getFilePath('property'), getFileSize('property'));
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Couldn\'t upload your image'];
                    return back()->withNotify($notify);
                }
                $propertyImage->save();

            }
        }


        $purifier = new \HTMLPurifier();
        $propertyInfo = PropertyInfo::where('property_id', $id)->firstOrNew();
        $propertyInfo->property_id = $property->id;
        $propertyInfo->room = $request->room;
        $propertyInfo->kitchen = $request->kitchen;
        $propertyInfo->bathroom = $request->bathroom;
        $propertyInfo->unit = $request->unit;
        $propertyInfo->floor = $request->floor;
        $propertyInfo->square_feet = $request->square_feet;
        $propertyInfo->price = $request->price;
        $propertyInfo->latitude = $request->latitude;
        $propertyInfo->longitude = $request->longitude;
        $propertyInfo->description = $purifier->purify($request->description);
        if($request->aminities){
            $propertyInfo->aminity = json_encode($request->aminities);
        }
        if($request->hasFile('floor_plan')){
            $old = $propertyInfo->floor_plan;
            $propertyInfo->floor_plan = fileUploader($request->floor_plan, getFilePath('property'), null, $old);
        }

        $propertyInfo->save();

        $notify[] = ['success', 'Property has been Updated'];
        return back()->withNotify($notify);


    }


    public function addWishlist($id) {

        $userid = auth()->user()->id;
        $check = Wishlist::where('user_id', $userid)->where('property_id', $id)->first();
        $data = new Wishlist();
        $data->user_id = $userid;
        $data->property_id = $id;

        if (auth()->check()) {

            if ($check) {
                $notify[] = ['error', 'Property  already has on your wishlist'];
                return back()->withNotify($notify);

            } else {
                $data->save();
                $notify[] = ['success', 'Property Add to wishlist'];
                return back()->withNotify($notify);

            }

        } else {
            $notify[] = ['warning', 'At first login your account'];
            return back()->withNotify($notify);
        }
    }


    public function wishlist() {
        $pageTitle = "Favourite Property Wishlist";

        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();

        $property = [];
        foreach ($wishlist as $key => $data) {
            $property[$key] = Property::where('id', $data->property_id)->with('location', 'city', 'propertyInfo', 'propertyImage')->first();
        }
        return view($this->activeTemplate . 'wishlist.list', compact('property', 'pageTitle'));
    }



}
