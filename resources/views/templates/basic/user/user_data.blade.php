@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Login Start **-=======-->
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-lg-5 col-md-8">
                <div class="login_wrapper">
                    <h4 class="loging_text mb-20">{{ __($pageTitle) }}</h4>

                    <form method="POST" action="{{ route('user.data.submit') }}">
                        @csrf
                        <div class="modal_body_wrapper">
                            <div class="form-group profile mb-15">
                                <label for="first_name">@lang('First Name')<span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text"name="firstname"value="{{ old('firstname') }}" required>
                                </div>
                            </div>
                           <div class="form-group profile mb-15">
                                <label for="first_name">@lang('Last Name')<span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text"name="lastname"value="{{ old('lastname') }}" required>
                                </div>
                            </div>
                            <div class="form-group profile mb-15">
                                <label for="first_name">@lang('Address')<span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text"name="address"value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="form-group profile mb-15">
                                <label for="first_name">@lang('State')<span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text"name="state"value="{{ old('state') }}">
                                </div>
                            </div>
                            <div class="form-group profile mb-15">
                                <label for="first_name">@lang('Zip Code')<span class="text-danger">*</span> </label>
                                <div class="single-input">
                                    <input  type="text"name="city"value="{{ old('city') }}">
                                </div>
                            </div>
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
