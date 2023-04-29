@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" style="background-image:url({{asset($activeTemplateTrue.'images/error-bg.jpg'
)}})">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-lg-6 col-md-10">
                <div class="login_wrapper">
                    <h4 class="loging_text mb-20">@lang('Login')</h4>
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                        @csrf
                        <div class="modal_body_wrapper">
                            <div class="form-group profile mb-15">
                                <label for="first_name">@lang('Username or Email') <span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text" name="username" value="{{ old('username') }}" id="first_name" placeholder="@lang('Username or Email')" required>
                                    <i class="fa-regular fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group profile mb-25">
                                <label for="inputSelect">@lang('Password')</label>
                                <div class="single-input">
                                    <input id="inputSelect" type="password" name="password" placeholder="@lang('Password')"required>
                                    <span class="eye_icon_show"><i class="fa-solid fa-eye-slash" toggle="#inputSelect"></i></span>
                                </div>
                            </div>
                            <div class="login_bottom mb-15">
                                <div class="checkbox style3">
                                    <div class="single_check mb-10">
                                            <input type="checkbox" id="test_1"name="remember" {{ old('remember') ? 'checked' : '' }} >
                                            <label for="test_1">
                                            @lang('Remember Me')
                                            </label>
                                    </div>
                                </div>
                                <a href="{{ route('user.password.request') }}" class="link style1">@lang('Forgot Password?')</a>
                            </div>
                            <div class="register_bottom mb-15">
                                <button class="theme_btn style_1"type="submit" id="recaptcha"><span class="btn_title">@lang('Login Now')<i class="fa-solid fa-angles-right"></i></span></button>
                                <a class='regis_btn' href="{{ route('user.register') }}">@lang('Register Now')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-**  Login End **-=======-->
@endsection
