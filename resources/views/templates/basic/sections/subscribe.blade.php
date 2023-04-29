@php
    $subscribes = getContent('subscribe.content', true);
@endphp
 <!--=======-**  cta End **-=======-->
 <section class="cta_area pt-100 pb-50 md-pt-50 md-pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="cta_bg">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="cta_content_wrap">
                                <div class="section_tilte style_2 text-center pb-50 pt-50">
                                    <h3 class="white_color mb-4">{{__($subscribes->data_values->heading)}}</h3>
                                    <p class="white_color mb-4">{{__($subscribes->data_values->subheading)}}</p>
                                    <div class="footer-subcribe cta_form mb-20">
                                        <form action="{{route('subscribe')}}" method="POST">
                                            @csrf
                                           <div class="cta_input_wrap">
                                                <input type="email" name="email" placeholder="Enter Your Email">
                                                <div class="cta_btn_box">
                                                    <button class="theme_btn style_1" type="submit">
                                                        <span class="btn_title">{{__($subscribes->data_values->button)}} <i class="fas fa-arrow-right"></i></span>
                                                    </button>
                                                </div>
                                           </div>
                                        </form>
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
<!--=======-**  cta End **-=======-->
