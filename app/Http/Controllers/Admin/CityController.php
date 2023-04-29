<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public  function index (){

        $pageTitle = 'Manage City';
        $cities = City::latest()->paginate(getPaginate());
        return view('admin.city.list',compact('cities','pageTitle'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:190|unique:cities',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $city=new City();
        $city->name=$request->name;

        if ($request->hasFile('image')) {
            try {
                $city->image = fileUploader($request->image, getFilePath('city'),getFileSize('city'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $city->status = $request->status ? 1: 0;
        $city->save();

        $notify[] = ['success', 'City has been created'];
        return back()->withNotify($notify);

    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|max:190',
            'image' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $city=City::findOrFail($request->id);
        $city->name = $request->name;
        if ($request->hasFile('image')) {
            try {
                $old = $city->image;
                $city->image = fileUploader($request->image, getFilePath('city'), getFileSize('city'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $city->status = $request->status ? 1: 0;
        $city->save();

        $notify[] = ['success', 'City has been Update'];
        return back()->withNotify($notify);

    }
}
