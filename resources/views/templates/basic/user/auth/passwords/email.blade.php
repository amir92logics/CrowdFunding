@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-lg-5 col-md-8">
                <div class="login_wrapper">
                    <h4 class="loging_text mb-20">{{ __($pageTitle) }}</h4>
                    <div class="login_social mb-25">
                        <p>@lang('To recover your account please provide your email or username to find your account.')
                        </p>
                    </div>

                    <form method="POST" action="{{ route('user.password.email') }}">
                        @csrf
                        <div class="form-group profile mb-15">
                            <label for="first_name">@lang('Username or Email')</label>
                            <div class="single-input">
                                <input  type="text" name="value" value="{{ old('value') }}" id="first_name" required autofocus="off">
                            </div>
                        </div>

                       <div class="form-group">
                        <div class="register_bottom mb-15">
                            <button class="theme_btn style_1"type="submit"><span class="btn_title">@lang('Submit')<i class="fa-solid fa-angles-right"></i></span></button>
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
