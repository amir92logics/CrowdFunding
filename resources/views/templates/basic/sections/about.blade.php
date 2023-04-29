@php
$about = getContent('about.content', true);
@endphp
<!--=======-**  About start End **-=======-->
<section class="about_area pt-100 pb-50 md-pt-60 md-pb-40">
    <div class="container">
        <div class="row ">
            <div class="col-xl-12">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="section_tilte  about_text mb-30">
                            <span>{{__($about->data_values->heading)}}</span>
                            <h3 class="py-2">{{__($about->data_values->subheading)}}</h3>
                            <p class="mb-3"> @if(strlen(__($about->data_values->short_description)) >150)
                                {{substr( __($about->data_values->short_description), 0,180).'...' }}
                                @else
                                {{__($about->data_values->short_description)}}
                                @endif</p>
                            <p class="mb-4">
                                @if(strlen(__($about->data_values->long_description)) >150)
                                {{substr( __($about->data_values->long_description), 0,180).'...' }}
                                @else
                                {{__($about->data_values->long_description)}}
                                @endif
                            </p>
                            <div class="about_bottom text-start">
                                <a class="theme_btn style_1" href="{{ url('/').$about->data_values->btn_url }}"><span
                                        class="btn_title">{{__($about->data_values->button)}}<i
                                            class="fa-solid fa-angles-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="about_img_right">
                            <div class="about_img_right__big_thumb">
                                <img src="{{ getImage(getFilePath('allImage').'/'.'about/'.@$about->data_values->background_image)}}"
                                    alt="Image">
                            </div>
                            <div class="about_small_thumb">
                                <img class="small_img"
                                    src="{{ getImage(getFilePath('allImage').'/'.'about/'.@$about->data_values->about_image)}}"
                                    alt="">
                                <div class="about_vide_icon">
                                    <div class="video-main">
                                        <div class="promo-video">
                                            <div class="waves-block">
                                                <div class="waves wave-1"></div>
                                                <div class="waves wave-2"></div>
                                                <div class="waves wave-3"></div>
                                            </div>
                                        </div>
                                        <a class="play-video popup_video" data-fancybox=""
                                            href="{{__($about->data_values->play_text)}}">
                                            <span class="play-btn"> <i class="fa fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-**  About Us End **-=======-->