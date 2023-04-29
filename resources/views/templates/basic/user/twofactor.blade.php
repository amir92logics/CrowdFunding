@extends($activeTemplate.'layouts.master')
@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="row justify-content-center gy-4">

        @if(!auth()->user()->ts)
        <div class="col-md-6">
            <div class="dashboard_box">
                <h4 >@lang('Add Your Account')</h4>
                <hr>

                    <h6 class="mb-3">
                        @lang('Use the QR code or setup key on your Google Authenticator app to add your account. ')
                    </h6>

                    <div class="form-group mx-auto text-center">
                        <img class="mx-auto" src="{{$qrCodeUrl}}">
                    </div>

                    <div class="form-group profile mt-2">
                        <div class="single-input">
                            <label class="form-label">@lang('Setup Key')</label>
                            <input type="text" name="key" value="{{$secret}}" class="referralURL" readonly>
                            <a type="button" class="copytext" id="copyBoard"> <i
                                class="fa fa-copy"></i> </a>
                        </div>
                    </div>

            </div>
        </div>

        @endif

        <div class="col-md-6">

            @if(auth()->user()->ts)
            <div >
                <div >
                    <h5 class="">@lang('Disable 2FA Security')</h5>
                </div>
                <form action="{{route('user.twofactor.disable')}}" method="POST">
                    <div>
                        @csrf
                        <input type="hidden" name="key" value="{{$secret}}">
                        <div class="form-group">
                            <label class="form-label">@lang('Google Authenticatior OTP')</label>
                            <input type="text" class="form-control form--control" name="code" required>
                        </div>
                        <div class="buttorn_wrapper text-end mt-4">
                            <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"><span class="btn_title">@lang('Save')</span><i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="dashboard_box">

                    <h4>@lang('Enable 2FA Security')</h4>
                    <hr>

                <form action="{{ route('user.twofactor.enable') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="key" value="{{$secret}}">
                        <div class="form-group profile col-12 mb-15">
                            <div class="single-input">
                                <label class="form-label">@lang('Google Authenticatior OTP')</label>
                                <input type="text" name="code" required>
                            </div>
                        </div>
                        <div class="buttorn_wrapper text-end mt-4">
                            <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"><span class="btn_title">@lang('Save')</span><i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection



@push('style')
<style>
    .copied::after {
        background-color: #{{ $general->base_color }
    }

    ;
    }
</style>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('#copyBoard').on('click', function () {
            var copyText = document.getElementsByClassName("referralURL");
            copyText = copyText[0];
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            copyText.blur();
            this.classList.add('copied');
            setTimeout(() => this.classList.remove('copied'), 1500);
        });
    })(jQuery);
</script>
@endpush
