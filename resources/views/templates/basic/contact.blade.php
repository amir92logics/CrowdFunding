@extends($activeTemplate.'layouts.frontend')
@php
    $contact = getContent('contact_us.content', true);
@endphp
@section('content')
 <!--=======-**  Contact Start **-=======-->
 <section class="contact-area pt-100 pb-80 md-pt-90 md-pb-20" >
    <div class="container position-relative">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <h3>{{__($contact->data_values->heading)}}</h3>
                <p>
                    @if(strlen(__($contact->data_values->subheading)) >120)
                    {{substr( __($contact->data_values->subheading), 0,150).'...' }}
                    @else
                    {{__($contact->data_values->subheading)}}
                    @endif</p>
            </div>
        </div>
        <div class="row align-items-center contact_bg">
            <div class="col-xl-7 col-lg-7 col-md-7 pb-30">
                <div class="contact-right-wrap mb-30">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_tilte mb-5">
                                <h3>@lang('Send us a Message')</h3>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{route('contact.submit')}}" class="verify-gcaptcha">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact-box mb-35">
                                    <i class="fa-regular fa-user"></i>
                                    <input class="contact-box__contact-home" type="text" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-box mb-35">
                                    <i class="fa-regular fa-envelope"></i>
                                        <input class="contact-box__contact-home" type="email" name="email" placeholder="Your Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-box mb-35">
                                    <i class="fa-solid fa-book"></i>
                                        <input class="contact-box__contact-home" type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-box mb-35">
                                    <i class="fa-regular fa-message"></i>
                                    <textarea class="contact-box__contact-home text-area" name="message" cols="30" rows="10" placeholder="Write Your Messege"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <button class="theme_btn style_1" type="submit" ><span class="btn_title">{{__($contact->data_values->button)}}<i class="fa-solid fa-angles-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="contact-info mb-30" >
                    <div class="contact-info__addres-wrap mb-30">
                        <div class="single-info mb-30">
                            <div class="cont-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="cont-text">
                                <h5>@lang('Office')</h5>
                                <h6><a href="javascript:void(0)">{{__($contact->data_values->contact_details)}}</a></h6>
                            </div>
                        </div>
                        <div class="single-info mb-30">
                            <div class="cont-icon">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="cont-text">
                                <h5>@lang('Call Us')</h5>
                                <h6><a href="javascript:void(0)">{{__($contact->data_values->contact_number)}}</a></h6>
                            </div>
                        </div>
                        <div class="single-info mb-30">
                            <div class="cont-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="cont-text">
                                <h5>@lang('Email')</h5>
                                <h6><a href="javascript:void(0)">{{__($contact->data_values->email_address)}}</a></h6>
                            </div>
                        </div>
                        <div class="single-info mb-30">
                            <div class="cont-icon">
                                <i class="fa-solid fa-fax"></i>
                            </div>
                            <div class="cont-text">
                                <h5>@lang('Fax')</h5>
                                <h6><a href="javascript:void(0)">{{__($contact->data_values->fax_number)}}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--=======-**  Contact End **-=======-->

<!--=======-** Google Map Start **-======-->
<div class="contact-google-map-area" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 p-0">
                <div class="contact-google-map">
                    <iframe src="https://maps.google.com/maps?q={{ $contact->data_values->latitude }},{{ $contact->data_values->longitude }}&hl=es;z=14&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=======-** Google Map End **-======-->
@endsection

