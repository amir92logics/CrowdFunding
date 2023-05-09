@extends($activeTemplate . 'layouts.frontend')

@section('content')
<!--=======-**  Featured Start **-=======-->
<section class="features_area pt-20 pb-80 md-pt-20 md-pb-30">
    <div class="container">

        <div class="row ">
            <aside class="col-xl-12 col-lg-12 col-md-12 car">
                <div class="widget_wrap">
                    <div class="widget_box mb-30 single_featured">
                    <div class="row ">
                        <div class="widget_box_header col-xl-3 col-lg-3 col-md-12">
                            <h4 class="mb-20">@lang('Advanced Search')</h4>
                        </div>
                        <div class="_widget_search col-xl-9 col-lg-9 col-md-12">
                            <form class="form" action="{{ route('property.search') }}" method="post">
                                @csrf
                                <div class="row ">
                                <div class="advance_search_input mb-20 col-xl-8 col-lg-8 col-md-12">
                                    <div class="form-group profile mb-15">

                                        <div class="single-input">
                                            <input type="text" class="advance-search-input" name="search" id="first_name"
                                                placeholder="@lang('Enter Search key..')">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="type" class="all_select">
                                        <option value="1">@lang('For Sale')</option>
                                        <option value="2">@lang('For Rent')</option>
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="property_type" class="all_select">
                                        <option value="0" hidden>@lang('Property type')</option>
                                        @foreach ($propertyTypes as $item)
                                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="city" class="all_select">
                                        <option value="0" hidden>@lang('City')</option>
                                        @foreach ($cities as $item)
                                        <option value="{{ $item->id }}"
                                            data-locations="{{ json_encode($item->location) }}">
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="location" class="all_select">
                                        <option selected="" disabled="">@lang('Select One')</option>
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="room" class="all_select">
                                        <option value="0" hidden>@lang('Room')</option>
                                        @foreach ($rooms as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="bathroom" class="all_select">
                                        <option value="0" hidden>@lang('Bathrooms')</option>
                                        @foreach ($bathrooms as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="advance_search_input mb-20">
                                    <p>@lang('Price Range')({{$general->cur_sym}}<span
                                            id="minTxt">@lang('10000')</span>-{{$general->cur_sym}}<span
                                            id="maxTxt">@lang('9000000')</span>)</p>
                                    <div class="range-slider">
                                        <div id="abcd"></div>
                                        <input type="hidden" name="min" id="min">
                                        <input type="hidden" name="max" id="max">
                                        <div class="clearfix"></div>
                                    </div>
                                </div> -->

                                <div class="widget_btn col-xl-4 col-lg-4 col-md-12">
                                    <button class="theme_btn style_1 style_full" type="submit">
                                        <span class="btn_title">@lang('Search') <i
                                                class="fa-solid fa-angles-right"></i></span>
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>


                <!-- <div class="widget_box mb-30 single_featured">
                    <div class="widget_box_header">
                        <h4 class="mb-20">@lang('Type Of Property')</h4>
                    </div>
                    <ul class="property_status">
                        @foreach($propertyTypes as $item)

                        <li>
                            <a href="{{route('properties')}}">{{__($item->name)}}</a>
                            <span>({{$item->properties_count}})</span>
                        </li>
                        @endforeach

                    </ul>
                </div> -->
                <!-- <div class="widget_box mb-30 single_featured">
                    <div class="widget_box_header">
                        <h4 class="mb-20">@lang('Contact Information')</h4>
                    </div>
                    <div class="helping-center">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Address')</h4>
                            <p>{{ __($contacts->data_values->contact_details) }}</p>
                        </div>
                    </div>
                    <div class="helping-center">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Phone')</h4>
                            <p><a href="javascript:void(0)">{{ __($contacts->data_values->contact_number) }}</a> </p>
                        </div>
                    </div>
                    <div class="helping-center">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Email')</h4>
                            <p><a href="javascript:void(0)">{{ __($contacts->data_values->email_address) }}</a> </p>
                        </div>
                    </div>
                </div> -->
            </aside>
            <div class="col-xl-12 col-lg-12">
                <div class="row">

                    @if($topProperties != null)
                    @foreach ($topProperties as $item)
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="single_featured top_property mb-30">
                            <div class="single_featured__img">
                                <h6 class="propery-top-badge">@lang('Featured Ad')</h6>
                                <div class="featured_wrapper featured_active_slider">
                                    @if ($item->propertyImage->count() > 0)
                                    @foreach ($item->propertyImage as $image)
                                    <div class="featured_single_slide">
                                        <img src="{{ getImage(getFilePath('property') . '/' . $image->image) }}"
                                            alt="Image">
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="featured_single_slide">
                                        <img src="{{ getImage(getFilePath('property') . '/') }}" alt="Image">
                                    </div>
                                    @endif
                                </div>
                                <div class="featured_price">{{ $general->cur_sym }}
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
                                    <!-- {{ showAmount(__(@$item->propertyInfo->price)) }} -->
                                    <!-- <span>
                                        @if($item->type == 2) @lang('/ month') @endif</span>  -->
                                    </div>
                            </div>
                            <div class="single_featured__content">
                                <div class="content_top_wrapper mb-10">
                                    <div class="tags">
                                        <!-- @if ($item->type == 1)
                                        <p class="mb-2">@lang('Sale')</p>
                                        @else
                                        <p class="mb-2">@lang('Rent')</p>
                                        @endif -->

                                        <!-- <p class="mb-2">{{ __($item->propertyType->name)
                                            }}</p> -->

                                    </div>

                                    <div class="heart">
                                        <a class="addWishlist" href="{{route('user.property.addwishlist',$item->id)}}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="location_date">
                                    <p><i class="fas fa-map-marker-alt fa-xs"></i> {{ __($item->location->name) }}, {{ __($item->city->name) }}
                                    </p>
                                    <!-- <p><i class="far fa-clock fa-md"></i> {{ diffForHumans($item->created_at) }}
                                    </p> -->
                                </div>
                                <h4 class="mb-3 mt-2 text--muted"><a
                                        href="{{ route('property.details',[ slug($item->title), $item->id]) }}">{{
                                        __($item->title) }}</a>
                                </h4>
                                <p class="my-3">
                                    @php 
                                    $string = substr($item->propertyInfo->description,0,100).'...';
                                    echo  @$string ; 
                                    @endphp
                                </p>
                                <!-- <ul class="featured_cat">
                                    <li class="featured_bed"><i class="fa-solid fa-house-user"></i><span>{{
                                            __(@$item->propertyInfo->room) }}</span> @lang('Room')
                                    </li>
                                    <li class="featured_bath"><i class="fas fa-bath"></i><span>{{
                                            __(@$item->propertyInfo->bathroom) }}</span> @lang('Bath')
                                    </li>
                                    <li class="featured_m-sqft"><i class="far fa-square"></i><span>{{
                                            __(@$item->propertyInfo->square_feet) }}</span> @lang('Sqft')
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @endif
                    @forelse ($properties as $item)
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="single_featured mb-30">
                            <div class="single_featured__img">

                                <div class="featured_wrapper featured_active_slider">
                                    @if ($item->propertyImage->count() > 0)
                                    @foreach ($item->propertyImage as $image)
                                    <div class="featured_single_slide">
                                        <img src="{{ getImage(getFilePath('property') . '/' . $image->image) }}"
                                            alt="Image">
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="featured_single_slide">
                                        <img src="{{ getImage(getFilePath('property') . '/') }}" alt="Image">
                                    </div>
                                    @endif
                                </div>
                                <div class="featured_price">{{ $general->cur_sym }}
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
                                    <!-- {{ showAmount(__(@$item->propertyInfo->price)) }} -->
                                    
                                    <!-- <span>
                                        @if($item->type == 2) @lang('/ month') @endif</span> -->
                                     </div>
                            </div>
                            <div class="single_featured__content">
                                <div class="content_top_wrapper mb-10">
                                

                                    <div class="heart">
                                        <a class="addWishlist" href="{{route('user.property.addwishlist',$item->id)}}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="location_date">
                                    <p><i class="fas fa-map-marker-alt fa-xs"></i> {{ __($item->location->name) }}, {{ __($item->city->name) }}
                                    </p>
                                    <!-- <p><i class="far fa-clock fa-md"></i> {{ diffForHumans($item->created_at) }}
                                    </p> -->
                                </div>
                                <h4 class="mb-3 mt-2 text--muted"><a
                                        href="{{ route('property.details',[ slug($item->title), $item->id]) }}">{{
                                        __($item->title) }}</a>
                                </h4>
                                <p class="my-3">
                                    @php 
                                    $string = substr($item->propertyInfo->description,0,100).'...';
                                    echo  @$string ; 
                                    @endphp
                                </p>
                                <!-- <p class="my-3">
                                {!!__($item->propertyInfo->description) !!}
                                </p> -->
                                <!-- <ul class="featured_cat">
                                    <li class="featured_bed"><i class="fa-solid fa-house-user"></i><span>{{
                                            __(@$item->propertyInfo->room) }}</span> @lang('Room')
                                    </li>
                                    <li class="featured_bath"><i class="fas fa-bath"></i><span>{{
                                            __(@$item->propertyInfo->bathroom) }}</span> @lang('Bath')
                                    </li>
                                    <li class="featured_m-sqft"><i class="far fa-square"></i><span>{{
                                            __(@$item->propertyInfo->square_feet) }}</span> @lang('Sqft')
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4 class="text-center d-flex justify-content-center align-items-center emptymsg">{{$emptyMessage}}
                    </h4>
                    @endforelse

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pagination-wrapper mt-30 mb-30 md-mt-10">
                                @if ($properties->hasPages())
                                <div class="py-4">
                                    {{ paginateLinks($properties) }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--=======-**  Featured End **-=======-->
@endsection

@push('script')
<script>
    (function ($) {
        "use strict";
        $('select[name=city]').on('change', function () {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location]').append(html);
        });

        $("#abcd").slider({
            range: true,
            min: 0,
            max: 1000000,
            values: [111400, 900000],
            step: 100,
            slide: function (event, ui) {
                $("#min").val(ui.values[0]), $("#max").val(ui.values[1]);
                $("#minTxt").html(ui.values[0]), $("#maxTxt").html(ui.values[1]);
            }
        });
    })(jQuery);

</script>
@endpush
