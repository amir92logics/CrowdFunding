@extends($activeTemplate.'layouts.master')
@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box mb-30">
        <h4 class="title mb-25">@lang('Personal Details ')</h4>
        <div class="dashboard_body">
            <div class="row">
                <div class="col-lg-12">
                    <form class="register" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('First Name')</label>
                                    <div class="single-input">
                                        <input type="text" name="firstname"
                                        value="{{$user->firstname}}" required>
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('Last Name')</label>
                                    <div class="single-input">
                                        <input type="text" name="lastname"
                                        value="{{$user->lastname}}" required>
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('E-mail Address')</label>
                                    <div class="single-input">
                                        <input type="text"value="{{$user->email}}" readonly>
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('Mobile Number')</label>
                                    <div class="single-input">
                                        <input type="text" value="{{$user->mobile}}" readonly>
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('Address')</label>
                                    <div class="single-input">
                                        <input type="text" name="address"
                                        value="{{@$user->address->address}}">
                                        <i class="fa-regular fa-address-book"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('State')</label>
                                    <div class="single-input">
                                        <input type="text" name="state"
                                        value="{{@$user->address->state}}">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('Zip Code')</label>
                                    <div class="single-input">
                                        <input type="text" name="zip"
                                        value="{{@$user->address->zip}}">
                                        <i class="fa-solid fa-hashtag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group profile mb-25">
                                    <label for="first_name1">@lang('Country')</label>
                                    <div class="single-input">
                                        <input type="text" value="{{@$user->address->country}}" disabled>
                                        <i class="fa-solid fa-earth-americas"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttorn_wrapper">
                            <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"> <span class="btn_title">@lang('Submit') <i class="fa-solid fa-angles-right"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

