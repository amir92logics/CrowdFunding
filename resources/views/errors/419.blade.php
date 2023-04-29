<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> {{ $general->siteName(__('419')) }}</title>

        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .error-pate-wrap {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                position: relative;
                z-index: 2;
            }

            .error-pate-wrap:before {}

            .error-pate-wrap:before {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                background: #2FC6A2;
                opacity: .5;
                z-index: -2;
            }
            .error-pate-wrap .theme_btn {
                text-decoration: none;
            }
            .error-content h1 {
                font-size: 140px;
            }

            .error-content p {
                color: #fff;
            }
        </style>
    </head>


    <body>
        <div class="error-pate-wrap d-flex align-items-center justify-content-center vh-100" style="background-image: url({{asset($activeTemplateTrue.'images/error-bg.jpg')}})">
            <div class="error-content text-center">
                <h1 class="display-1 fw-bold text-white">@lang('419')</h1>
                <p class="fs-1"> <span class="text-white">@lang('Opps!')</span>@lang('Page not found.')</p>
                <p class="lead mb-40">
                    @lang('The page you’re looking for doesn’t exist.')
                  </p>
                <a href="{{route('home')}}" class="theme_btn style_1"><span class="btn_title">@lang('Go Home')<i class="fa-solid fa-angles-right"></i></span> </a>
            </div>
        </div>
    </body>
</html>


