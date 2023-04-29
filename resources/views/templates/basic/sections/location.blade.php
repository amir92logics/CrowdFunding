@php
$location = getContent('location.content', true);
$cities = App\Models\City::where('status', 1)->inRandomOrder()->limit(6)->get();
@endphp
<!--=======-**  Popular Place Start **-=======-->
<section class="popular_place pt-100 pb-50 md-pt-60 md-pb-30">
    <div class="container">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <span>{{__($location->data_values->top_heading)}}</span>
                <h3 class="py-2">{{__($location->data_values->heading)}}</h3>
                <p class="subheading">{{__($location->data_values->subheading)}}</p>
            </div>
        </div>
        <div class="row">
            @foreach($cities as $key=>$item)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single_popular mb-30">
                    <div class="single_popular__image">
                        <a href="{{route('properties')}}">
                            <img class="img-fluid" src="{{ getImage(getFilePath('city').'/'.@$item->image)}}"
                                alt="image">
                        </a>
                        <div class="popular_content">
                            <h4><a href="{{route('property.city',$item->id)}}">{{__($item->name)}}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--=======-**  Popular Place End **-=======-->
