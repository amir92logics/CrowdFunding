<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    public function index(){
        $pageTitle = 'Manage PropertyType';
        $propertyTypes=PropertyType::latest()->paginate(getPaginate());
        return view('admin.property_type.list',compact('propertyTypes','pageTitle'));
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|unique:property_types',
        ]);

        $propertyType = new PropertyType();
        $propertyType->name=$request->name;
        $propertyType->status = $request->status ? 1 : 0;
        $propertyType->save();

        $notify[] = ['success', 'propertyType has been created'];
        return back()->withNotify($notify);

    }

    public function update(Request $request){

        $propertyType =PropertyType::findOrFail($request->id);
        $propertyType->name=$request->name;
        $propertyType->status = $request->status ? 1 : 0;
        $propertyType->save();

        $notify[] = ['success', 'propertyType has been Updated'];
        return back()->withNotify($notify);

    }

}
