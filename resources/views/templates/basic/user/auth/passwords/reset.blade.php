@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-lg-5 col-md-8">
                <div class="login_wrapper">
                    <h4 class="pb-3 text-center border-bottom">@lang('Reset Password')</h4>
                    <div class="mb-4">
                        <p>@lang('Your account is verified successfully. Now you can change your password. Please enter
                            a strong password and don\'t share it with anyone.')</p>
                    </div>
                    <form method="POST" action="{{ route('user.password.update') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group profile mb-15">
                            <label class="form-label">@lang('Password')</label>
                            <div class="single-input">
                            <input type="password" name="password" required>
                            </div>
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

                        <div class="form-group profile mb-15">
                            <label for="first_name">@lang('Confirm Password')</label>
                            <div class="single-input">
                                <input type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="register_bottom mb-15">
                                <button class="theme_btn style_1"type="submit"><span class="btn_title">@lang('Save')<i class="fa-solid fa-angles-right"></i></span></button>
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
