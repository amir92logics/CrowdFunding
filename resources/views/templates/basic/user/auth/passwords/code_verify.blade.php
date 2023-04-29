@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="verification-code-wrapper">
                <div class="verification-area">
                    <h4 class="pb-3 text-center border-bottom">@lang('Verify Email Address')</h4>
                    <form action="{{ route('user.password.verify.code') }}" method="POST" class="submit-form">
                        @csrf
                        <p class="verification-text">@lang('A 6 digit verification code sent to your email address')
                            : {{ showEmailAddress($email) }}</p>
                        <input type="hidden" name="email" value="{{ $email }}">

                        @include($activeTemplate.'partials.verification_code')

                        <div class="form-group">
                            <div class="register_bottom mb-15">
                                <button class="theme_btn style_1"type="submit"><span class="btn_title">@lang('Save')<i class="fa-solid fa-angles-right"></i></span></button>
                            </div>
                           </div>

                        <div class="form-group">
                            @lang('Please check including your Junk/Spam Folder. if not found, you can')
                            <a href="{{ route('user.password.request') }}">@lang('Try to send again')</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-**  Login End **-=======-->
@endsection
