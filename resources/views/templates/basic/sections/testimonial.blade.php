@php
$testimonial = getContent('testimonial.content', true);
$testimonialElements = getContent('testimonial.element', false);
@endphp
<!--=======-**  Testimonials Start **-=======-->
<section class="testimonials_area testimonials_bg pt-100 pb-80 md-pt-60 md-pb-30">
    <div class="container">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <span>{{__($testimonial->data_values->top_heading)}}</span>
                <h3 class="py-2">{{__($testimonial->data_values->heading)}}</h3>
                <p class="subheading">{{__($testimonial->data_values->subheading)}}</p>
            </div>
        </div>
        <div class="row testimonials_active">
            @foreach($testimonialElements as $item)
            <div class="single_testimonial mb-30">
                <ul class="social_star mb-10">
                    @if($item->data_values->rating == 1)
                    <li><i class="fa fa-star"></i></li>
                    @elseif($item->data_values->rating == 2)
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    @elseif($item->data_values->rating == 3)
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    @elseif($item->data_values->rating == 4)
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    @elseif($item->data_values->rating == 5)
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    @endif
                    <li>({{__($item->data_values->rating)}})</li>
                </ul>
                <div class="single_testimonial__text">
                    <p> @if(strlen(__($item->data_values->description)) >120)
                        {{substr( __($item->data_values->description), 0,150).'...' }}
                        @else
                        {{__($item->data_values->description)}}
                        @endif
                    </p>
                </div>
                <div class="single_testimonial__bottom">
                    <div class="thumb">
                        <img src="{{ getImage(getFilePath('allImage').'/'.'testimonial/'.@$item->data_values->testimonial_image)}}"
                            alt="">
                    </div>
                    <div class="client">
                        <h4>{{__($item->data_values->name)}}</h4>
                        <p>{{__($item->data_values->title)}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>
<!--=======-**  Testimonials End **-=======-->