@php
$listing = getContent('property.content', true);
$properties = App\Models\Property::where('status', 1)->with('location', 'city',
'propertyInfo','propertyImage','propertyType')->orderBy('id', 'DESC')->limit(7)->get();
$subscripProperties = [];

$topProperties = App\Models\Property::whereHas('featuredPlan', function ($q) {
            $q->where('expire_date' ,'>' , now());
        })->inRandomOrder()->limit(2)->get();
@endphp
<!--=======-**  Featured Start **-=======-->
<section class="features_area pt-50 pb-80 md-pt-40 md-pb-50">
    <div class="container">
        <div class="row">
            <div class="section_tilte text-center pb-50">
                <span>{{__($listing->data_values->top_heading)}}</span>
                <div class="section_tilte__top">
                    <h3 class="py-2">{{__($listing->data_values->heading)}}</h3>
                </div>
                <p class="subheading">{{__($listing->data_values->subheading)}}</p>
            </div>
        </div>
        <div class="row">
            @if($topProperties != null)
            @foreach ($topProperties as $item)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="single_featured top_property mb-30">
                    <div class="single_featured__img">
                        <h6 class="propery-top-badge">@lang('Featured Ad')</h6>
                        <div class="featured_wrapper featured_active_slider">
                            @if($item->propertyImage->count() > 0)
                            @foreach( $item->propertyImage as $image)
                            <div class="featured_single_slide">
                                <img src="{{ getImage(getFilePath('property').'/'.$image->image)}}" alt="Image">
                            </div>
                            @endforeach
                            @else
                            <div class="featured_single_slide">
                                <img src="{{ getImage(getFilePath('property').'/')}}" alt="Image">
                            </div>
                            @endif
                        </div>
                        <div class="featured_price">{{$general->cur_sym}}
                        @php
                                $num = $item->propertyInfo->price;
                                @endphp
                                @if ($num >= 1000 && $num <= 999999) 
                                @php echo  @floor($num / 1000) . ' K' @endphp
                               
                                @elseif ($num >= 1000000 && $num <= 999999999) 
                                @php echo  @floor($num / 1000000) . ' M' @endphp
                                @elseif ($num >= 1000000000 && $num <=  999999999999 ) 
                                @php echo  @floor($num / 1000000000) . ' B' @endphp
                                @elseif ($num >= 1000000000000) 
                                @php echo  @floor($num / 1000000000000) . ' T' @endphp
                                @else 
                                @php echo  @$num @endphp
                                @endif
                            <!-- {{showAmount(__(@$item->propertyInfo->price))}}  -->
                            
                            <!-- @if($item->type==2)<span> @lang('/
                                month')</span>@endif  -->
                            </div>
                    </div>
                    <div class="single_featured__content">
                        <div class="content_top_wrapper mb-10">
                            <div class="tags">
                                <!-- @if($item->type==1)
                                <p class=" mb-2">@lang('Sale')</p>
                                @else
                                <p class=" mb-2">@lang('Rent')</p>
                                @endif -->

                                <!-- <p class=" mb-2">{{__($item->propertyType->name)}}</p> -->

                            </div>

                            <div class="heart">
                                <a href="{{route('user.property.addwishlist',$item->id)}}">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </div>

                        <div class="location_date">
                            <p><i class="fas fa-map-marker-alt fa-xs"></i> {{__($item->location->name)}}, {{__($item->city->name)}}</p>
                            <!-- <p><i class="far fa-clock fa-md"></i> {{diffForHumans($item->created_at) }}</p> -->
                        </div>
                        <h4 class="mb-4 mt-3 text-muted"><a
                                href="{{route('property.details',['slug' => slug($item->title), 'id' => $item->id])}}">{{__($item->title)}}</a>
                        </h4>
                        <p class="my-3">
                                    @php 
                                    $string = substr($item->propertyInfo->description,0,100).'...';
                                    echo  @$string ; 
                                    @endphp
                                </p>
                        <!-- <ul class="featured_cat">
                            <li class="featured_bed"><i
                                    class="fa-solid fa-house-user"></i><span>{{__(@$item->propertyInfo->room)}}</span>
                                @lang('Room')</li>
                            <li class="featured_bath"><i
                                    class="fas fa-bath"></i><span>{{__(@$item->propertyInfo->bathroom)}}</span>
                                @lang('Bath')</li>
                            <li class="featured_m-sqft"><i
                                    class="far fa-square"></i><span>{{__(@$item->propertyInfo->square_feet)}}</span>
                                @lang('Sqft')</li>
                        </ul> -->

                    </div>
                </div>
            </div>
            @endforeach
            @else
            @endif

            @foreach ($properties as $item)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="single_featured mb-30">
                    <div class="single_featured__img">

                        <div class="featured_wrapper featured_active_slider">
                            @if($item->propertyImage->count() > 0)
                            @foreach( $item->propertyImage as $image)
                            <div class="featured_single_slide">
                                <img src="{{ getImage(getFilePath('property').'/'.$image->image)}}" alt="Image">
                            </div>
                            @endforeach
                            @else
                            <div class="featured_single_slide">
                                <img src="{{ getImage(getFilePath('property').'/')}}" alt="Image">
                            </div>
                            @endif
                        </div>
                        <div class="featured_price">{{$general->cur_sym}}
                        @php
                                $num = $item->propertyInfo->price;
                                @endphp
                                @if ($num >= 1000 && $num <= 999999) 
                                @php echo  @floor($num / 1000) . ' K' @endphp
                               
                                @elseif ($num >= 1000000 && $num <= 999999999) 
                                @php echo  @floor($num / 1000000) . ' M' @endphp
                                @elseif ($num >= 1000000000 && $num <=  999999999999 ) 
                                @php echo  @floor($num / 1000000000) . ' B' @endphp
                                @elseif ($num >= 1000000000000) 
                                @php echo  @floor($num / 1000000000000) . ' T' @endphp
                                @else 
                                @php echo  @$num @endphp
                                @endif
                            <!-- {{showAmount(__(@$item->propertyInfo->price))}}  -->
                            <!-- @if($item->type==2)<span> @lang('/
                                month')</span>@endif -->
                             </div>
                    </div>
                    <div class="single_featured__content">
                        <div class="content_top_wrapper mb-10">
                            <div class="tags">
                                <!-- @if($item->type==1)
                                <p class=" mb-2">@lang('Sale')</p>
                                @else
                                <p class=" mb-2">@lang('Rent')</p>
                                @endif -->

                                <!-- <p class=" mb-2">{{__($item->propertyType->name)}}</p> -->

                            </div>

                            <div class="heart">
                                <a href="{{route('user.property.addwishlist',$item->id)}}">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </div>

                        <div class="location_date">
                            <p><i class="fas fa-map-marker-alt fa-xs"></i> {{__($item->location->name)}}, {{__($item->city->name)}}</p>
                            <!-- <p><i class="far fa-clock fa-md"></i> {{diffForHumans($item->created_at) }}</p> -->
                        </div>
                        <h4 class="mb-4 mt-3 text-muted"><a
                                href="{{route('property.details',['slug' => slug($item->title), 'id' => $item->id])}}">{{__($item->title)}}</a>
                        </h4>
                        <p class="my-3">
                                    @php 
                                    $string = substr($item->propertyInfo->description,0,100).'...';
                                    echo  @$string ; 
                                    @endphp
                                </p>
                        <!-- <ul class="featured_cat">
                            <li class="featured_bed"><i
                                    class="fa-solid fa-house-user"></i><span>{{__(@$item->propertyInfo->room)}}</span>
                                @lang('Room')</li>
                            <li class="featured_bath"><i
                                    class="fas fa-bath"></i><span>{{__(@$item->propertyInfo->bathroom)}}</span>
                                @lang('Bath')</li>
                            <li class="featured_m-sqft"><i
                                    class="far fa-square"></i><span>{{__(@$item->propertyInfo->square_feet)}}</span>
                                @lang('Sqft')</li>
                        </ul> -->

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--=======-**  Featured End **-=======-->
