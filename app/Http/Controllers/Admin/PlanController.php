<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

      public function index(){

        $pageTitle = 'Plan';
        $plans=Plan::orderBy('id')->paginate(getPaginate());
        return view('admin.plan.list',compact('plans','pageTitle'));

      }

      public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'inquiries_limit'=>'required|numeric',
            'listing_limit'=>'required|numeric',
            'validity'=>'required|numeric|min:1',
        ]);


        $plan = new Plan();
        $plan->name=$request->name;
        $plan->price=$request->price;
        $plan->inquiries_limit=$request->inquiries_limit;
        $plan->listing_limit=$request->listing_limit;
        $plan->validity=$request->validity;
        $plan->status = $request->status ? 1 : 0;
        $plan->save();

        $notify[] = ['success', 'Plan has been created'];
        return back()->withNotify($notify);

      }


      public function Update(Request $request){

        $plan =Plan::findOrFail($request->id);
        $plan->name=$request->name;
        $plan->price=$request->price;
        $plan->inquiries_limit=$request->inquiries_limit;
        $plan->listing_limit=$request->listing_limit;
        $plan->validity=$request->validity;
        $plan->status = $request->status ? 1 : 0;
        $plan->save();

        $notify[] = ['success', 'Plan has been Updated'];
        return back()->withNotify($notify);

      }
}
