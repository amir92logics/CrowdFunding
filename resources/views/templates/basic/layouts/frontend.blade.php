<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('partials.seo')
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'webfonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/basictable.css')}}">


    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom-animate.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/slick.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/responsive.css')}}">


    @stack('style-lib')
    @stack('style')
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{ $general->base_color }}">
</head>
<body>
    <div class="offcanvas-overlay"></div>
     <!--=======-** Peloaders Start **-=======-->
     <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!--=======-** Peloaders End **-=======-->

    @include($activeTemplate.'partials.header')
    <main>
        @if(request()->route()->uri != '/')
  @include($activeTemplate.'partials.breadcrumb')
  @endif

@yield('content')

    </main>
    @include($activeTemplate.'partials.footer')

@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(($cookie->data_values->status == 1) && !\Cookie::get('gdpr_cookie'))
    <!-- cookies dark version start -->
    <div class="cookies-card text-center hide">
      <p class="mt-4 cookies-card__content">{{ $cookie->data_values->short_desc }} <a class="text--primary" href="{{ route('cookie.policy') }}" target="_blank">@lang('learn more')</a></p>
      <div class="cookies-card__btn mt-4">
        <a href="javascript:void(0)" class="theme_btn policy"><span class="btn_title">@lang('Allow')</span></a>
      </div>
    </div>
  <!-- cookies dark version end -->
  @endif


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/global/js/jquery-3.6.0.min.js')}}"></script>
{{-- <script src="{{asset('assets/global/js/bootstrap.bundle.min.js')}}"></script> --}}

<script src="{{asset($activeTemplateTrue.'js/waypoints.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/counterup.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/rangeSlider.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/slick.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>


@stack('script-lib')
@stack('script')
@include('partials.plugins')
@include('partials.notify')


<script>
    (function ($) {
        "use strict";

        $('.policy').on('click',function(){
            $.get('{{route('cookie.accept')}}', function(response){
                $('.cookies-card').addClass('d-none');
            });
        });


        $(".language-select").on("change", function () {
        window.location.href = "{{ route('home') }}/change/" + $(this).val();
        });


        setTimeout(function(){
            $('.cookies-card').removeClass('hide')
        },2000);

    })(jQuery);
</script>

</body>
</html>
