@extends($activeTemplate . 'layouts.master')
@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box mb-30">
        <h4 class="title mb-25">@lang('Manage Dashboard')</h4>
        <div class="dashboard_body">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 ">
                    <a href="{{ route('user.property.list') }}">
                        <div class="dashboard_item-top mb-30">
                            <div class="icon">
                                <i class="fa-solid fa-house" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <p class="type ml-1">{{ __($properties) }}</p>
                                <p class=" ml-1">@lang('Published Investment')</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('user.inquiry.myinquirieslist') }}">
                        <div class="dashboard_item-top mb-30">
                            <div class="icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="info">
                                <p class="type ml-1">{{__($inquiry)}}</p>
                                <p class=" ml-1"> @lang('Inquires')</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{route('user.property.list.wishlist')}}">
                        <div class="dashboard_item-top mb-30">
                            <div class="icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="info">
                                <p class="type ml-1">{{ __($wishlists) }} </p>
                                <p class=" ml-1"> @lang('Favourite Listing')</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 ">
                    <div class="dashboard_item subscrib">
                        <h4>@lang('Subscribed Pricing')</h4>
                        <hr>
                        <div class="row gy-4">
                            @foreach($plan as $plan)
                            <div class="col-xl-4 col-lg-6">
                                <div class="subscribe">
                                    @if ($plansubscribe)
                                    <h6 class="number">{{ __($plan->name) }} - {{ $general->cur_sym }}{{
                                        showAmount(__($plan->price)) }}</h6>
                                    <p>{{ __($plan->listing_limit) }} @lang('Listings Per Month')</p>
                                    <p>@lang('Unlimited Inquiries')</p>
                                    <p class="get-support">@lang('Lifetime Support')</p>
                                    @if($plan->id==$plansubscribe->plan_id)
                                    <span class="badge bg--primary">@lang('Purchased')</span>
                                    <br>
                                    <span class="badge bg-secondary">@lang('Will expire on')
                                        {{showDateTime($plansubscribe->expire_date)}}</span>
                                    @else
                                    <a href="{{route('user.payment',$plan->id)}}" class="theme_btn style_1 mb-10"><span
                                            class="btn_title">@lang('Buy
                                            Now ')<i class="fa-solid fa-angles-right"></i></span> </a>
                                    @endif

                                    @if ($plansubscribe->expire_date < now() && $plan->id==$plansubscribe->plan_id)
                                        <p class="badge text-bg-danger text-danger">
                                            (@lang('Expired'))


                                        </p>
                                        @endif
                                        @endif

                                        @if (!$plansubscribe)
                                        <h4 class="text-muted">@lang('No Plan')</h4>
                                        @endif

                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection