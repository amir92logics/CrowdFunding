<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $pageTitle = 'Manage Location';
        $locations=Location::latest()->with('city')->paginate(getPaginate());
        $cities=City::where('status',1)->select('id','name')->get();

        return view('admin.location.list',compact('locations','cities','pageTitle'));
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|unique:locations',
            'city'=>'required|exists:cities,id'
        ]);

        $location = new Location();
        $location->name=$request->name;
        $location->city_id=$request->city;
        $location->status = $request->status ? 1 : 0;
        $location->save();

        $notify[] = ['success', 'Location has been created'];
        return back()->withNotify($notify);

    }

    public function update(Request $request){

        $location =Location::findOrFail($request->id);
        $location->name=$request->name;
        $location->city_id=$request->city;
        $location->status = $request->status ? 1 : 0;
        $location->save();

        $notify[] = ['success', 'Location has been Updated'];
        return back()->withNotify($notify);

    }
}
