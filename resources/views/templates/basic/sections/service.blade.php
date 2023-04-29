@php
$service = getContent('service.content', true);
$serviceElements = getContent('service.element', false);
@endphp
<!--=======-**  Why choose Us Start **-=======-->
<section class="our_main_focus why_choose_us why_choose_us_bg pt-100 pb-60 md-pt-60 md-pb-30">
    <div class="container">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <span>{{__($service->data_values->top_heading)}}</span>
                <h3 class="py-2">{{__($service->data_values->heading)}}</h3>
                <p class="subheading">{{__($service->data_values->subheading)}}</p>

            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($serviceElements as $item)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="single_main why_choose_us mb-30">
                    <div class="single_main__thumb">
                        <img src="{{ getImage(getFilePath('allImage').'/'.'service/'.@$item->data_values->service_image)}}"
                            alt="">
                    </div>
                    <div class="single_main__content">
                        <h4>
                            @if(strlen(__($item->data_values->title)) > 18)
                            {{substr( __($item->data_values->title), 0, 25).'...' }}
                            @else
                            {{__($item->data_values->title)}}
                            @endif
                        </h4>
                        <p>
                            @if(strlen(__($item->data_values->description)) >80)
                            {{substr( __($item->data_values->description), 0,90).'...' }}
                            @else
                            {{__($item->data_values->description)}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--=======-**  Why choose Us End **-=======-->
