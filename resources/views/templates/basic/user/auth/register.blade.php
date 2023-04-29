@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $policyPages = getContent('policy_pages.element',false,null,true);
@endphp
 <!--=======-**  register Start **-=======-->
 <section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" style="background-image:url({{asset($activeTemplateTrue.'images/error-bg.jpg'
 )}})">
    <div class="container">
        <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha">
            @csrf
        <div class="row justify-content-center">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-lg-6 col-md-10">
                <div class="register_wrapper">
                    <h4 class="loging_text mb-20">@lang('Register')</h4>

                    @if(session()->get('reference') != null)
                    <div class="form-group profile mb-25">
                        <label for="referenceBy">@lang('Reference by')</label>
                        <div class="single-input">
                            <input type="text" name="referBy" id="referenceBy" value="{{session()->get('reference')}}" readonly>
                        </div>
                    </div>
                    @endif

                    <div class="form-group profile mb-15">
                        <label for="first_name">@lang('Username')<span class="text-danger">*</span> </label>
                        <div class="single-input">
                            <input type="text" id="first_name" name="username" value="{{ old('username') }}"placeholder="@lang('Your Username')" required>
                            <i class="fa-regular fa-user"></i>
                        </div>
                    </div>
                    <div class="form-group profile mb-15">
                        <label for="last_name">@lang('E-Mail Address')<span class="text-danger">*  </label>
                        <div class="single-input">
                            <input type="email" id="last_name" name="email" value="{{ old('email') }}" placeholder="@lang('Your Email')" required>
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group profile mb-25">
                                <div class="nice_select_wrapper mb-30 style_1">
                                    <label class="state">@lang('Country')<span class="text-danger">*</span></label>
                                    <select name="country" class="all_select">
                                        @foreach($countries as $key => $country)
                                        <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group profile mb-25">
                                <div class="form-group single-input">
                                    <label class="state">@lang('Mobile')<span class="text-danger">*</span></label>
                                    <div class="mobile-input-wrap">
                                        <span class="input-group-text mobile-code">
                                        </span>

                                        <input type="hidden" name="mobile_code">
                                        <input type="hidden" name="country_code">
                                        <input type="number" name="mobile" value="{{ old('mobile') }}" class="mobile-number checkUser" required>
                                    </div>
                                    <small class="text-danger mobileExist"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group profile mb-25">
                                <label for="state">@lang('Password') <span class="text-danger">*</span></label>
                                <div class="single-input">
                                    <input id="state"type="password" name="password" placeholder="Password" required>
                                    <i class="fa-solid fa-eye-slash" toggle="#state"></i>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group profile mb-15">
                                <label for="last_name">@lang('Confirm Password')<span class="text-danger">*  </label>
                                <div class="single-input">
                                    <input type="password" id="last_name" name="password_confirmation"placeholder="@lang('Confirm Password')" required>
                                    <i class="fa-solid fa-eye-slash" toggle="#state"></i>
                                </div>
                            </div>
                        </div>

                    </div>


                    <x-captcha></x-captcha>

                    @if($general->agree)
                    <div class="checkbox_wrap">
                       <div class="single_check mb-25">
                            <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                            <label for="agree">@lang('I agree with') @foreach($policyPages as $policy) <a href="{{ route('policy.pages',[slug($policy->data_values->title),$policy->id]) }}">{{ __($policy->data_values->title) }}</a> @if(!$loop->last), @endif @endforeach</label>
                       </div>
                   </div>
                   @endif
                   <div class="register_bottom mb-15">
                    <button class="theme_btn style_1"type="submit" id="recaptcha"><span class="btn_title">@lang('Register')<i class="fa-solid fa-angles-right"></i></span></button>
                    <a class='regis_btn' href="{{ route('user.login') }}">@lang('Already have an account?')</a>
                </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<!--=======-**  register End **-=======-->
@endsection

@push('style')
<style>
    .country-code .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }

    .mobile-input-wrap {
    position: relative;
    border-radius: 5px;
}

.mobile-input-wrap span.input-group-text.mobile-code {
    border-right: 0;
    border-radius: 5px 0 0 5px;
    position: absolute;
    border: 0;
    height: 95%;
    top: 1px;
    left: 1px;
    background: #f5f7fb;
    border-right: 1px solid #ddd;
}
.form-group.profile .single-input input.mobile-number.checkUser {
    padding-left: 65px;
}

</style>
@endpush
@push('script')
    <script>
      "use strict";
        (function ($) {
            @if($mobileCode)
            $(`option[data-code={{ $mobileCode }}]`).attr('selected','');
            @endif

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });

                $('[name=password]').focus(function () {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function () {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });


            @endif

            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response.data != false && response.type == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response.data != false){
                    $(`.${response.type}Exist`).text(`${response.type} already exist`);
                  }else{
                    $(`.${response.type}Exist`).text('');
                  }
                });
            });
        })(jQuery);

    </script>
@endpush
