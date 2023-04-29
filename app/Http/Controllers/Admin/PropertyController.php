<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use App\Models\PropertyImage;
use App\Models\PropertyInfo;

class PropertyController extends Controller
{
      public function index(){

        $pageTitle = 'Manage Properties';
        $properties = Property::latest()->with('location', 'city','propertyInfo')->paginate(getPaginate(20));
        return view('admin.property.list',compact('properties','pageTitle'));

      }


      public function create(){
        $pageTitle = 'Add New Property';
        $cities = City::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        return view('admin.property.create',compact('cities','propertyTypes','pageTitle'));
      }


      public function propertyEdit($id){
        $pageTitle = 'Edit Property';
        $cities = City::orderBy('name', 'asc')->where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        $property = Property::find($id);
        $propertyInfo=PropertyInfo::where('property_id',$id)->first();
        $propertyImage=PropertyImage::where('property_id',$id)->get();

        return view('admin.property.update',compact('property','propertyInfo','propertyImage','cities','propertyTypes','pageTitle'));

      }

      public  function store(Request $request){

        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'email' => 'nullable|email|max:60',
            'phone' => 'nullable|max:40',
            'aminities.*'=>'required',
            'type' => 'required|in:1,2',
            'floor_plan' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'images.*' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $property = new Property();
        $property->title = $request->title;
        $property->property_type = $request->property_type;
        $property->city_id = $request->city;
        $property->location_id = $request->location;
        $property->video_link = $request->video_link;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $property->type = $request->type;
        $property->status = 1;
        $property->save();

        if($request->images){
         foreach($request->images as $image){

          $propertyImage=new PropertyImage();
          $propertyImage->property_id=$property->id;
            try {
                $propertyImage->image = fileUploader($image, getFilePath('property'),getFileSize('property'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
            $propertyImage->save();

         }}

        $purifier = new \HTMLPurifier();
        $propertyInfo=new PropertyInfo();
        $propertyInfo->property_id=$property->id;
        $propertyInfo->room=$request->room;
        $propertyInfo->kitchen=$request->kitchen;
        $propertyInfo->bathroom=$request->bathroom;
        $propertyInfo->unit=$request->unit;
        $propertyInfo->floor=$request->floor;
        $propertyInfo->square_feet=$request->square_feet;
        $propertyInfo->price=$request->price;
        $propertyInfo->latitude=$request->latitude;
        $propertyInfo->longitude=$request->longitude;
        $propertyInfo->description=$purifier->purify($request->description);
        if($request->aminities){
            $propertyInfo->aminity = json_encode($request->aminities);
        }
        if($request->hasFile('floor_plan')){
            $propertyInfo->floor_plan = fileUploader($request->floor_plan, getFilePath('property'));
        }
        $propertyInfo->save();

        $notify[] = ['success', 'Property has been created'];
        return back()->withNotify($notify);

      }

      public function update(Request $request, $id){
        $request->validate([
          'title' => 'required|max:255',
          'property_type' => 'required|exists:property_types,id',
          'city' => 'required|exists:cities,id',
          'location' => 'required|exists:locations,id',
          'email' => 'nullable|email|max:60',
          'phone' => 'nullable|max:40',
          'aminities.*'=>'required',
          'type' => 'required|in:1,2',
          'floor_plan' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
          'images.*' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
      ]);
        $property = Property::find($id);
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
         foreach($request->images as $image){
          $propertyImage=new PropertyImage();
          $propertyImage->property_id=$property->id;
            try {
                $propertyImage->image = fileUploader($image, getFilePath('property'),getFileSize('property'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
            $propertyImage->save();

          }
        }

        $purifier = new \HTMLPurifier();
        $propertyInfo = PropertyInfo::where('property_id', $id)->firstOrNew();
        $propertyInfo->property_id=$property->id;
        $propertyInfo->room=$request->room;
        $propertyInfo->kitchen=$request->kitchen;
        $propertyInfo->bathroom=$request->bathroom;
        $propertyInfo->unit=$request->unit;
        $propertyInfo->floor=$request->floor;
        $propertyInfo->square_feet=$request->square_feet;
        $propertyInfo->price=$request->price;
        $propertyInfo->latitude=$request->latitude;
        $propertyInfo->longitude=$request->longitude;
        $propertyInfo->description=$purifier->purify($request->description);
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

      public function imageRemove(Request $request){
        $request->validate([
          'id' => 'required'
      ]);

      $image =  PropertyImage::findOrFail($request->id);
      $path = getFilePath('property');
      fileManager()->removeFile($path.'/'.$image->image);
      $image->delete();
      $notify[] = ['success','Property Image has been deleted'];
      return back()->withNotify($notify);

      }
}
