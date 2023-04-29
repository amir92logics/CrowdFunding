<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PlanSubscribe;
use Stripe\Service\PlanService;

class PlanSubscribeController extends Controller
{


    public function buyPlan(Request $request)
    {
        
        return view($this->activeTemplate.'user.payment.deposit');
    }

}
