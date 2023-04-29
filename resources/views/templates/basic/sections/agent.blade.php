@php
$service = getContent('agent.content', true);
$serviceElements = getContent('agent.element', false);
@endphp
<!--=======-**  Meet Our Agent Start **-=======-->
<section class="meet_our_agent_area primary-linear-bg pt-100 pb-100 md-pt-60 md-pb-60">
    <div class="container">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <span>{{__($service->data_values->top_heading)}}</span>
                <h3 class="py-2">{{__($service->data_values->heading)}}</h3>
                <p class="subheading">{{__($service->data_values->subheading)}}</p>
            </div>
        </div>
        <div class="row agent_active">
            @foreach($serviceElements as $item)
            <div class="single_agent">
                <div class="single_agent__img">
                    <img src="{{ getImage(getFilePath('allImage').'/'.'agent/'.@$item->data_values->agent_image)}}"
                        alt="">
                    <ul class="social">
                        <li><a href="{{__($item->data_values->text_1)}}"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li><a href="{{__($item->data_values->text_2)}}"> <i class="fab fa-twitter"></i> </a></li>
                        <li><a href="{{__($item->data_values->text_3)}}"> <i class="fab fa-linkedin"></i> </a></li>
                    </ul>
                </div>
                <div class="single_agent__content">
                    <h4><a href="agent_list.html">{{__($item->data_values->title)}}</a></h4>
                    <p>@if(strlen(__($item->data_values->description)) >30)
                        {{substr( __($item->data_values->description), 0,40).'...' }}
                        @else
                        {{__($item->data_values->description)}}
                        @endif</p>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!--=======-**  Meet Our Agent End **-=======-->