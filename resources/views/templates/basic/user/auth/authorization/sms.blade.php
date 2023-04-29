
@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="verification-code-wrapper">
                <div class="verification-area">
                    <h5 class="pb-3 text-center border-bottom">@lang('Verify Mobile Number')</h5>
                    <form action="{{route('user.verify.mobile')}}" method="POST" class="submit-form">
                        @csrf
                        <p class="verification-text">@lang('A 6 digit verification code sent to your mobile number') : +{{
                            showMobileNumber(auth()->user()->mobile) }}</p>
                        @include($activeTemplate.'partials.verification_code')
                        <div class="register_bottom mb-15">
                            <button class="theme_btn style_1"type="submit"><span class="btn_title">@lang('Save')<i class="fa-solid fa-angles-right"></i></span></button>
                        </div>
                        <div class="form-group">
                            <p>
                                @lang('If you don\'t get any code'), <a href="{{route('user.send.verify.code', 'phone')}}"
                                    class="forget-pass"> @lang('Try again')</a>
                            </p>
                            @if($errors->has('resend'))
                            <br />
                            <small class="text-danger">{{ $errors->first('resend') }}</small>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-**  Login End **-=======-->
@endsection
