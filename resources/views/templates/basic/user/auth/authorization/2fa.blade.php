@extends($activeTemplate .'layouts.frontend')
@section('content')
<section class="login_area login_bg pt-70 pb-80 md-pt-50 md-pb-50" >
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="verification-code-wrapper">
            <div class="verification-area">
                <h5 class="pb-3 text-center border-bottom">@lang('2FA Verification')</h5>
                <form action="{{route('user.go2fa.verify')}}" method="POST" class="submit-form">
                    @csrf

                    @include($activeTemplate.'partials.verification_code')

                    <div class="register_bottom mb-15">
                        <button class="theme_btn style_1"type="submit"><span class="btn_title">@lang('Save')<i class="fa-solid fa-angles-right"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('script')
<script>
    (function ($) {
        "use strict";
        $('#code').on('input change', function () {
            var xx = document.getElementById('code').value;

            $(this).val(function (index, value) {
                value = value.substr(0, 7);
                return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
            });

        });
    })(jQuery)
</script>
@endpush
