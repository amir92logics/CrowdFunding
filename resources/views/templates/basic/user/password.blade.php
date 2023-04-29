@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box">
        <h4 class="title mb-25">@lang('Change Password')</h4>
        <div class="dashboard_body">
            <div class="login_wrapper">
                <form action="" method="post">
                    @csrf
                <div class="form-group profile mb-15">
                    <label for="old_pass">@lang('Current Password')</label>
                    <div class="single-input">
                        <input type="password" name="current_password" required autocomplete="current-password">
                        <i class="fa-solid fa-eye-slash" toggle="#old_pass"></i>
                    </div>
                </div>
                <div class="form-group profile mb-15">
                    <label for="new_pass">@lang('New Password')</label>
                    <div class="single-input">
                        <input type="password" name="password" required autocomplete="current-password">
                        <i class="fa-solid fa-eye-slash" toggle="#new_pass"></i>
                        @if($general->secure_password)
                        <div class="input-popup">
                            <p class="error lower">@lang('1 small letter minimum')</p>
                            <p class="error capital">@lang('1 capital letter minimum')</p>
                            <p class="error number">@lang('1 number minimum')</p>
                            <p class="error special">@lang('1 special character minimum')</p>
                            <p class="error minimum">@lang('6 character password')</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group profile mb-25">
                    <label for="again_new_pass">@lang('Confirm Password')</label>
                    <div class="single-input">
                        <input type="password" name="password_confirmation"
                        required autocomplete="current-password">
                        <i class="fa-solid fa-eye-slash" toggle="#again_new_pass"></i>
                    </div>
                </div>
                <div class="register_bottom mb-15">
                    <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"> <span class="btn_title">@lang('Change Password')<i class="fa-solid fa-angles-right"></i></span></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
