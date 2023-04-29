<?php

namespace App\Http\Controllers\Gateway;

use App\Models\Plan;
use App\Models\User;
use App\Models\Deposit;
use App\Lib\FormProcessor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\GatewayCurrency;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use App\Models\FeaturedPlan;
use App\Models\FeaturedSubscription;
use App\Models\PlanSubscribe;

class PaymentController extends Controller
{

    public function payment($id)
    {

        $plansubscribe=  PlanSubscribe::where('user_id', @auth()->user()->id)->with('getUserPlanSubscribe')->orderBy('id','desc')->first();

            if($plansubscribe){
                $plan = Plan::findOrFail($id);
                if($plansubscribe->amount > $plan->price){

                    $notify[] = ['error', 'You Can not subscribe to this plan'];
                    return back()->withNotify($notify);
                }
                if($plansubscribe->plan_id==$id){
                    $notify[] = ['error', 'Already Subscribed to this Plan'];
                    return back()->withNotify($notify);
                }
            }


        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Payment Methods';

        $plan = Plan::find($id);

        return view($this->activeTemplate . 'user.payment.payment', compact('gatewayCurrency', 'pageTitle','plan'));
    }

    // featured plan
    public function FeaturedPlanpayment($id){

        $featuredPlan = FeaturedPlan::find($id);
        $featuredPlanSubscribe = FeaturedSubscription::where('user_id', @auth()->user()->id)->with('FeaturedPlanSubscribe')->orderBy('created_at','desc')->first();
        if(@$featuredPlanSubscribe){
            $featuredPlan = FeaturedPlan::findOrFail($id);

                if(@$featuredPlanSubscribe->amount > @$featuredPlan->price){

                    $notify[] = ['error', 'You Can not subscribe to this plan'];
                    return back()->withNotify($notify);
                }
                if(@$featuredPlanSubscribe->plan_id==$id){
                    $notify[] = ['error', 'Already Subscribed to this Plan'];
                    return back()->withNotify($notify);
                }
        }

        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Payment Methods';

        $featuredPlan = FeaturedPlan::find($id);
        $property_id = request()->property_id;
        return view($this->activeTemplate . 'user.payment.featuredplan_payment', compact('property_id','gatewayCurrency', 'pageTitle','featuredPlan'));

    }

    public function deposit()
    {

        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Deposit Methods';
        return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'pageTitle'));
    }

    public function depositInsert(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);


        $user = auth()->user();
        $plan_id = $request->plan_id;
        $is_plan = $request->is_plan;
        $property_id = $request->property_id;


        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid gateway'];
            return back()->withNotify($notify);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            $notify[] = ['error', 'Please follow deposit limit'];
            return back()->withNotify($notify);
        }

        $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
        $payable = $request->amount + $charge;
        $final_amo = $payable * $gate->rate;

        $data = new Deposit();
        $data->user_id = $user->id;
        $data->method_code = $gate->method_code;
        $data->method_currency = strtoupper($gate->currency);
        $data->amount = $request->amount;
        $data->plan_id = $plan_id;
        $data->property_id = $property_id;
        $data->is_plan = $is_plan ;
        $data->charge = $charge;
        $data->rate = $gate->rate;
        $data->final_amo = $final_amo;
        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        session()->put('Track', $data->trx);

        return to_route('user.deposit.confirm');
    }


    public function appDepositConfirm($hash)
    {
        try {
            $id = decrypt($hash);
        } catch (\Exception $ex) {
            return "Sorry, invalid URL.";
        }
        $data = Deposit::where('id', $id)->where('status', 0)->orderBy('id', 'DESC')->firstOrFail();
        $user = User::findOrFail($data->user_id);
        auth()->login($user);
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');
    }


    public function depositConfirm()
    {
        $track = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) {
            return to_route('user.deposit.manual.confirm');
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'pageTitle', 'deposit'));
    }


    public static function userDataUpdate($deposit,$isManual = null)
    {
        if ($deposit->status == 0 || $deposit->status == 2) {
            $deposit->status = 1;
            $deposit->save();

            $user = User::find($deposit->user_id);
            $user->balance += $deposit->amount;
            $user->save();



            $transaction = new Transaction();
            $transaction->user_id = $deposit->user_id;
            $transaction->amount = $deposit->amount;
            $transaction->post_balance = $user->balance;
            $transaction->charge = $deposit->charge;
            $transaction->trx_type = '+';
            $transaction->details = 'Deposit Via ' . $deposit->gatewayCurrency()->name;
            $transaction->trx = $deposit->trx;
            $transaction->remark = 'deposit';
            $transaction->save();

            if($deposit->is_plan == 0){
                $plan = Plan::findOrFail($deposit->plan_id);

                $planSubscribe=new PlanSubscribe();
                $planSubscribe->user_id= $user->id;
                $planSubscribe->plan_id=$plan->id;
                $planSubscribe->amount= $plan->price;
                $planSubscribe->expire_date= now()->addDays($plan->validity);
                $planSubscribe->save();

            }else{
                $FeaturedPlan = FeaturedPlan::findOrFail($deposit->plan_id);

                $FeaturedPlanSubscribe=new FeaturedSubscription();
                $FeaturedPlanSubscribe->user_id = $user->id;
                $FeaturedPlanSubscribe->plan_id = $FeaturedPlan->id;
                $FeaturedPlanSubscribe->property_id = $deposit->property_id;
                $FeaturedPlanSubscribe->amount = $FeaturedPlan->price;
                $FeaturedPlanSubscribe->expire_date = now()->addDays($FeaturedPlan->validity);
                $FeaturedPlanSubscribe->save();
            }

            if($deposit->is_plan == 0){
                $adminNotification              = new AdminNotification();
                $adminNotification->user_id     = $user->id;
                $adminNotification->title       = $plan->name.' Plan Subscribe from '.$user->username;
                $adminNotification->click_url   = urlPath('admin.users.detail',$user->id);
                $adminNotification->save();

                notify($user, 'PLAN SUBSCRIBE', [
                    'plan_name'=>$plan->name,
                    'amount' => showAmount($plan->price),
                    'trx' => $user->trx,
                    'post_balance' => showAmount($user->balance)
                ]);
            }else{
                $adminNotification              = new AdminNotification();
                $adminNotification->user_id     = $user->id;
                $adminNotification->title       = $FeaturedPlan->name.' Featured Plan Subscribe from '.$user->username;
                $adminNotification->click_url   = urlPath('admin.users.detail',$user->id);
                $adminNotification->save();

                notify($user, 'PLAN SUBSCRIBE', [
                    'plan_name'=>$FeaturedPlan->name,
                    'amount' => showAmount($FeaturedPlan->price),
                    'trx' => $user->trx,
                    'post_balance' => showAmount($user->balance)
                ]);

            }


            if (!$isManual) {
                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = 'Deposit successful via '.$deposit->gatewayCurrency()->name;
                $adminNotification->click_url = urlPath('admin.deposit.successful');
                $adminNotification->save();
            }

            notify($user, $isManual ? 'DEPOSIT_APPROVE' : 'DEPOSIT_COMPLETE', [
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'post_balance' => showAmount($user->balance)
            ]);


        }
    }

    public function manualDepositConfirm()
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        if ($data->method_code > 999) {

            $pageTitle = 'Deposit Confirm';
            $method = $data->gatewayCurrency();
            $gateway = $method->method;
            return view($this->activeTemplate . 'user.payment.manual', compact('data', 'pageTitle', 'method','gateway'));
        }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        $gatewayCurrency = $data->gatewayCurrency();
        $gateway = $gatewayCurrency->method;
        $formData = $gateway->form->form_data;

        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);


        $data->detail = $userData;
        $data->status = 2; // pending
        $data->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $data->user->id;
        $adminNotification->title = 'Deposit request from '.$data->user->username;
        $adminNotification->click_url = urlPath('admin.deposit.details',$data->id);
        $adminNotification->save();

        notify($data->user, 'DEPOSIT_REQUEST', [
            'method_name' => $data->gatewayCurrency()->name,
            'method_currency' => $data->method_currency,
            'method_amount' => showAmount($data->final_amo),
            'amount' => showAmount($data->amount),
            'charge' => showAmount($data->charge),
            'rate' => showAmount($data->rate),
            'trx' => $data->trx
        ]);

        $notify[] = ['success', 'You have deposit request has been taken'];
        return to_route('user.deposit.history')->withNotify($notify);
    }


}
