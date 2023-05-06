@extends($activeTemplate . 'layouts.frontend')

@section('content')
@php
$banner = getContent('banner.content', true);
$propertyTypes = App\Models\PropertyType::withcount('properties')->get();
$cities = App\Models\City::where('status', 1)
->with('location')
->get();
$bathrooms = App\Models\PropertyInfo::groupby('bathroom')
->distinct()
->pluck('bathroom');
$rooms = App\Models\PropertyInfo::groupby('room')
->distinct()
->pluck('room');
@endphp
<!--=======-** Banner Start **-=======-->
<section class="banner_area banner-bg">
        <div class="bird-wrap">
            <div class="bird-container bird-container--one">
                <div class="bird bird--one"></div>
            </div>
            <div class="bird-container bird-container--two">
                <div class="bird bird--two"></div>
            </div>
            <div class="bird-container bird-container--three">
                <div class="bird bird--three"></div>
            </div>
            <div class="bird-container bird-container--four">
                <div class="bird bird--four"></div>
            </div>
        </div>
    <div class="container">

        <div class="row">
            <div class="col-xl-12">

                <div class="banner_content_wrapper">
                    <div class="banner_top_text">
                        <!-- <span class="banner-top-title">{{__($general->site_name)}}</span> -->
                        <h2 class="animate-charcter banner_title">{{ __($banner->data_values->heading) }}</h2>
                        <p class="banner-des">{{ __($banner->data_values->subheading) }}</p>

                    </div>

                    <div class="banner_tab_wrapper">
                        <form action="{{ route('property.search') }}" method="post">
                            @csrf
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">

                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="nice_select_wrapper banner mb-30 style_1">
                                                <!-- <p>@lang('type')</p>
                                                <select name="type" class="all_select">
                                                    <option value="1">@lang('For Sale')</option>
                                                    <option value="2">@lang('For Rent')</option>
                                                </select> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="nice_select_wrapper banner mb-30 style_1">
                                                <p>@lang('Investment type')</p>
                                                <select name="property_type" class="all_select">
                                                    <option value="0" hidden>@lang('Investment type')</option>
                                                    @foreach ($propertyTypes as $item)
                                                    <option value="{{ $item->id }}">{{ __($item->name) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <!-- <div class="advance_search_wrap mb-30">
                                                <p>@lang('Advance Search')</p>
                                                <span class="advance_btn">@lang('Advance Search')<i
                                                        class="fa-sharp fa-solid fa-angle-down"></i></span>
                                            </div> -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="advance_search_wrap mb-25 button">
                                                <button class="theme_btn"><span class="btn_title">@lang('Search Now')<i
                                                            class="fa-solid fa-angles-right"></i></span></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel">

                                    <div class="row align-items-center">
                                       
                                        <div class="col-lg-4 col-md-6">
                                            <div class="advance_search_wrap mb-30">
                                                <p>@lang('Advance Search')</p>
                                                <span class="advance_btn">@lang('Advance Search')<i
                                                        class="fa-sharp fa-solid fa-angle-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="advance_search_wrap mb-25 button">
                                                <button class="theme_btn"><span class="btn_title">@lang('Search Now')<i
                                                            class="fa-solid fa-angles-right"></i></span></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="advance_search_wrapper">

                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="nice_select_wrapper style_1">
                                            <p>@lang('City')</p>
                                            <select name="city" class="all_select">
                                                <option value="0" hidden>@lang('City')</option>
                                                @foreach ($cities as $item)
                                                <option value="{{ $item->id }}"
                                                    data-locations="{{ json_encode($item->location) }}">
                                                    {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="nice_select_wrapper style_1">
                                            <p>@lang('Location')</p>
                                            <select name="location" class="all_select">
                                                <option selected="" disabled="">@lang('Select One')</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="nice_select_wrapper style_1">
                                            <p>@lang('Bathroom')</p>
                                            <select name="bathroom" class="all_select">
                                                <option value="0" hidden>@lang('Bathrooms')</option>
                                                @foreach ($bathrooms as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="nice_select_wrapper style_1">
                                            <p>@lang('Room')</p>
                                            <select name="room" class="all_select">
                                                <option value="0" hidden>@lang('Room')</option>
                                                @foreach ($rooms as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="advance_search_input">
                                            <p>@lang('Price Range') ({{$general->cur_sym}}<span
                                                    id="minTxt">@lang('10000')</span>-{{$general->cur_sym}}<span
                                                    id="maxTxt">@lang('9000000')</span>)</p>
                                            <div class="range-slider">
                                                <div id="abcd"></div>
                                                <input type="hidden" name="min" id="min">
                                                <input type="hidden" name="max" id="max">
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                        <div class="advance_search_input">
                                            <div class="form-group profile mb-15">
                                                <p>@lang('Search Key')</p>
                                                <div class="single-input">
                                                    <input type="text" class="advance-search-input" name="search" id="first_name"
                                                        placeholder="@lang('Enter Search key..')">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--=======-** Banner End **-=======-->


@if ($sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
@include($activeTemplate . 'sections.' . $sec)
@endforeach
@endif
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
            values: [111400, 900000 ],
            step: 100,
            slide: function (event, ui) {
                $("#min").val(ui.values[0]), $("#max").val(ui.values[1]);
                $("#minTxt").html(ui.values[0]), $("#maxTxt").html(ui.values[1]);
            }
        });

    })(jQuery);
</script>
@endpush
