<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedPlan;
use Illuminate\Http\Request;

class FeaturedPlanController extends Controller
{
    public function index(){
        $pageTitle = 'All Featured Plan Lists';
        $featuredPlans = FeaturedPlan::orderBy('created_at','desc')->paginate(getPaginate(12));
        return view('admin.featuredPlan.index',compact('featuredPlans','pageTitle'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:190|unique:featured_plans',
            'price'=>'required|numeric',
            'validity'=>'required|numeric|min:1',
        ]);

        $featuredPlan = new FeaturedPlan();
        $featuredPlan->title =$request->title;
        $featuredPlan->price =$request->price;
        $featuredPlan->validity =$request->validity;
        $featuredPlan->status = $request->status ? 1 : 0;
        $featuredPlan->save();

        $notify[] = ['success', 'Featured Plan has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:190',
            'price'=>'required|numeric',
            'validity'=>'required|numeric|min:1',
        ]);

        $featuredPlan =FeaturedPlan::findOrFail($request->id);
        $featuredPlan->title =$request->title;
        $featuredPlan->price =$request->price;
        $featuredPlan->validity =$request->validity;
        $featuredPlan->status = $request->status ? 1 : 0;
        $featuredPlan->save();

        $notify[] = ['success', 'Featured Plan has been Updated'];
        return back()->withNotify($notify);
    }
}
