<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    @include('partials.seo')


    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/global/css/all.min.css')}}" rel="stylesheet">

    <!-- ==== CSS here ==== -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'webfonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/basictable.css')}}">

    <!-- fontawesome -->
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
    @include($activeTemplate.'partials.user_header')

    <main>
        @if(request()->route()->uri != '/')
        @include($activeTemplate.'partials.breadcrumb')
        @endif

        <section class="features_area dahsboard-bg pt-20 pb-80 md-pt-20 md-pb-30">
            <div class="container">
                <div class="row">

                    @include($activeTemplate.'partials.side_nav')

                    @yield('content')

                </div>
            </div>
        </section>

    </main>

    @include($activeTemplate.'partials.footer')


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/global/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/global/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset($activeTemplateTrue.'js/waypoints.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/counterup.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/rangeSlider.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/bootstrap.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/slick.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.basictable.js') }}"></script>
    <script src="{{ asset('assets/global/js/ckeditor.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/main.js') }}"></script>


    @stack('script-lib')
    @include('partials.notify')
    @include('partials.plugins')
    @stack('script')

    <script>
        "use strict";
        $(".language-select").on("change", function () {
            window.location.href = "{{ route('home') }}/change/" + $(this).val();
        });

        if ($(".trumEdit")[0]) {
            ClassicEditor
                .create(document.querySelector('.trumEdit'))
                .then(editor => {
                    window.editor = editor;
                });
        }
    </script>


</body>

</html>
