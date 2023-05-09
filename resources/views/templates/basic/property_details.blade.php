@extends($activeTemplate.'layouts.frontend')

@section('content')
<!--=======-**  Featured Start **-=======-->
<section class="features_area pt-20 pb-80 md-pb-40 md-pt-60">
    <div class="container">

        <div class="row flex-wrap-reverse">
            <aside class="col-xl-4 col-lg-4 col-md-12 car">
                <div class="widget_wrap">
                    <div class="widget_box mb-30">
                        <div class="widget_box_header">
                            <h4 class="mb-20">@lang('Advanced Search')</h4>
                        </div>
                        <div class="_widget_search">
                            <form class="form" action="{{ route('property.search') }}" method="post">
                                @csrf
                                <div class="advance_search_input mb-20">
                                    <div class="form-group profile mb-15">
                                        <div class="single-input">
                                            <input type="text" name="search" id="first_name"
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
                                        <option value="" hidden>@lang('Property type')</option>
                                        @foreach ($propertyTypes as $item)
                                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="city" class="all_select">
                                        <option value="" hidden>@lang('City')</option>
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
                                        <option value="" hidden>@lang('Room')</option>
                                        @foreach ($rooms as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="nice_select_wrapper mb-20 style_1">
                                    <select name="bathroom" class="all_select">
                                        <option value="" hidden>@lang('Bathrooms')</option>
                                        @foreach ($bathrooms as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div> -->

                                <!-- <div class="advance_search_input mb-20">
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
                                <div class="widget_btn">
                                    <button class="theme_btn style_1 style_full" type="submit">
                                        <span class="btn_title">@lang('Search') <i
                                                class="fa-solid fa-angles-right"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- inquiry --}}
                    <div class="widget_box mb-30">
                        <div class="widget_box_header">
                            <h4 class="mb-20">@lang('Inquiry')</h4>
                        </div>
                        <form action="{{route('user.inquiry.submit', $properties->id)}}" method="POST">
                            @csrf
                            <div class="modal_body_wrapper">
                                <div class="form-group profile mb-15">
                                    <label for="first_name">@lang('Enter Your Inquiry')</label>
                                    <div class="single-input">
                                        <textarea name="inquiry" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="register_bottom mb-15">
                                    <button class="theme_btn style_1" type="submit"><span class="btn_title">@lang('Send
                                            Inquiry')<i class="fa-solid fa-angles-right"></i></span></button>
                                </div>
                            </div>
                        </form>

                    </div>
                    {{-- endinquiry --}}
                    <!-- <div class="widget_box mb-30">
                        <div class="widget_box_header">
                            <h4 class="mb-20">@lang('Contact Information')</h4>
                        </div>
                        <div class="helping-center">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="adress">
                                <h4>@lang('Address')</h4>
                                <p>{{__($contacts->data_values->contact_details)}}</p>
                            </div>
                        </div>
                        <div class="helping-center">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="adress">
                                <h4>@lang('Phone')</h4>
                                <p><a href="javascript:void(0)">{{__($contacts->data_values->contact_number)}}</a> </p>
                            </div>
                        </div>
                        <div class="helping-center">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="adress">
                                <h4>@lang('Email')</h4>
                                <p><a href="javascript:void(0)">{{__($contacts->data_values->email_address)}}</a> </p>
                            </div>
                        </div>
                    </div> -->


                </div>
            </aside>
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <section class="headings-2 pt-0">
                            <div class="single_top_wrap">
                                <div class="single_top_wrap__title_wrap">
                                    <div class="listing_title">
                                        <h4>{{__($properties->title)}}
                                        </h4>
                                        <div class="mt-0">
                                                <p><i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                                    {{__($properties->location->name)}}, {{__($properties->city->name)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_top_wrap__detail mr-2">
                                    <div class="detail_wrapper">
                                        <div class="listing-title-bar">
                                            <h4>{{$general->cur_sym}}
                                            @php
                                $num = $properties->propertyInfo->price;
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
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="single_featured single_list_featured propery_listing_single mb-30 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single_featured__img">
                                        <div class="featured_wrapper featured_active_slider">
                                            @if($properties->propertyImage->count() > 0)
                                            @foreach($properties->propertyImage as $image)
                                            <div class="featured_single_slide">
                                                <img src="{{ getImage(getFilePath('property').'/'.$image->image)}}"
                                                    alt="Image">
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="featured_single_slide">
                                                <img src="{{ getImage(getFilePath('property').'/')}}" alt="Image">
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                                <ul class="social-share">
                                    <li><a href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{slug($properties->title)}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?status={{slug($properties->title)}}+{{ Request::url() }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{slug($properties->title)}}&source=propertee"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <a href="{{route('user.promote.property',$properties->id)}}"><span class="promote-btn">@lang('Promote this Investment')</span></a>
                                <h4>{{__($properties->title)}}</h4>
                                <p class="my-3">
                                    @php echo @$properties->propertyInfo->description ; @endphp
                                </p>
                        </div>
                      
                                    <div class="propery_listing_single mb-30 single_featured">

<div class="property-details-tabs-wrap">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">@lang('Business Pitch')</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="market-tab" data-bs-toggle="tab" data-bs-target="#market" type="button" role="tab" aria-controls="market" aria-selected="true">@lang('Market Projection')</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="communication-tab" data-bs-toggle="tab" data-bs-target="#communication" type="button" role="tab" aria-controls="communication" aria-selected="true">@lang('Communication Channel')</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">@lang('About & Industry')</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="true">@lang('Team')</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button" role="year" aria-controls="home" aria-selected="true">@lang('Year Founded')</button>
        </li>
       
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">@lang('Video')</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">@lang('Location')</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">Business Pitch</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->business_pitch ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab">
        <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">Market Projection</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->market_projection ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="communication" role="tabpanel" aria-labelledby="communication-tab">
        <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">Communication Channel</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->communication_channel ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
        <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">About & Industry</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->about_history ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
        <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">Year Founded</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->year_founded ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
        <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="mb-30">
                    <h4 class="mb-25">Team</h4>
                    <div class="single homes-content details mb-30">
                    <p class="my-3">
                    @php echo @$properties->propertyInfo->team ; @endphp
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>

                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="propery_listing_single mb-30 single_featured">
                                                <h4 class="mb-25">@lang('Video')</h4>
                                                <div class="propery_listing_single__thumb">
                                                    <img class="small_img" src="{{asset($activeTemplateTrue.'images/v_image.png')}}" alt="">
                                                    <div class="about_vide_icon">
                                                        <a class="play-video popup_video" data-fancybox=""
                                                            href="{{__($properties->video_link)}}">
                                                            <span class="play-btn round-animated"> <i class="fa-solid fa-play"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="propery_listing_single single_featured">
                                                <h4 class="mb-25">@lang('Location')</h4>
                                                <div class="google_map_wrap">
                                                    <iframe
                                                        src="https://maps.google.com/maps?q={{ @$properties->propertyInfo->latitude }},{{ @$properties->propertyInfo->longitude }}&hl=es;z=14&amp;output=embed"
                                                        height="400"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                  </div>
                            </div>

                        </div>
                    </div>












                </div>
            </div>
        </div>

        <!--=======-**  Similar Properties Start **-=======-->
        <section class=" pt-100 md-pt-80">
            <div class="container">
                <div class="row">
                    <div class="section_tilte">
                        <div class="section_tilte__top">
                            <h3>@lang('Similar Listing')</h3>
                        </div>
                    </div>
                </div>
                <div class="row testimonials_active propery_listing_single">
                    @foreach($latests as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="single_featured similar-properties-gap-x mb-30">
                            <div class="single_featured__img">
                                <div class="featured_wrapper featured_active_slider">
                                    @if($item->propertyImage->count() > 0)
                                    @foreach($item->propertyImage as $image)
                                    <div class="featured_single_slide">
                                        <a href="">
                                            <img src="{{ getImage(getFilePath('property').'/'.$image->image)}}"
                                                alt="Image">
                                        </a>
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
                                </div>
                            </div>
                            <div class="single_featured__content">
                                <div class="content_top_wrapper mb-10">

                                    <div class="heart">
                                        <a href="{{route('user.property.addwishlist',$item->id)}}">
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
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--=======-**  Similar Properties End **-=======-->
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
