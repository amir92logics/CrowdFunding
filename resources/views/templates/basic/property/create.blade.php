@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <form action="{{route('user.property.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="dashboard_box pb-0">
            <h4 class="title mb-25">@lang('Add new Investment')</h4>
            <div class="dashboard_body">
                <div class="row">
                    <div class="login_wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Investment Title')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="title"
                                            placeholder="@lang('Investment Title')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Phone')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="phone"
                                            placeholder="@lang('Enter Your Phone')" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Email')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="email"
                                            placeholder="@lang('Enter Your Email')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Video link')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="video_link"
                                            placeholder="@lang('Enter Your video link')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Investment type')</p>
                                    <select name="property_type" class="all_select">
                                        @foreach($propertyTypes as $propertyType)
                                        <option value="{{$propertyType->id}}">{{__($propertyType->name)}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('City')</p>
                                    <select name="city" id="city" class="all_select" required>
                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">
                                            {{__($city->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Location')</p>
                                    <select name="location" id="location" class="all_select" required="">
                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Investment Purpose')</p>
                                    <select name="type" class="all_select">
                                        <option value="1">@lang('For Rent')</option>
                                        <option value="2">@lang('For Sale')</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Room')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="room"
                                            placeholder="@lang('Investment Room')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Kitchen')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="kitchen"
                                            placeholder="@lang('Investment Kitchen')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Bathroom')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="bathroom"
                                            placeholder="@lang('Investment Bathroom')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Unit')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="unit"
                                            placeholder="@lang('Investment Unit')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Floor')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="floor"
                                            placeholder="@lang('Investment Floor')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Square Feet')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="square_feet"
                                            placeholder="@lang('Investment Square Feet')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Latitude')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="latitude"
                                            placeholder="@lang('Latitude')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Longitude')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="longitude"
                                            placeholder="@lang('Longitude')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Price')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="price"
                                            placeholder="@lang('Investment Price')" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group profile mb-20">
                                    <label for="new_pass">@lang('Investment Description')</label>
                                    <div class="single-input">
                                        <textarea class="trumEdit" name="description"
                                            placeholder="@lang('Investment Description')" id="new_pass" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group profile mb-15">
                                    <label>@lang('Floor Plan')</label>
                                    <div class="single-input">
                                        <input type="file" name="floor_plan" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row form-group profile property-img">
                                    <div class="col-12">
                                        <label for="proeerty_salce_price">@lang('Investment Image')</label>
                                    </div>
                                    <div class="col-12 mb-3 ">
                                        <div class="property-listing-wrap">
                                            <div class="file-upload-wrapper add-new-wraper "
                                                data-text="@lang('Select your image!')">
                                                <input type="file" name="images[]" id="inputAttachments"
                                                    class="file-upload-field" />
                                            </div>
                                            <div class="propery-img-btn">
                                                <button type="button" class=" property-btn extraTicketAttachment ms-0">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div id="fileUploadsContainer"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard_box pt-0">
            <h4 class="title mb-25">@lang('Investment Aminities')</h4>
            <div class="row amenitiesField">
                <div class="col-md-12 data-amenities">
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-12">
                                <div class="add-new-wraper ">
                                    <input name="aminities[]" type="text" required
                                        placeholder="@lang('Enter Amenities or Investment')">
                                    <span class="input-group-btn">
                                        <button class="btn btn--danger btn-lg removeAmenities w-100" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-1">
                    <button type="button" class="btn bg--primary addAmenities">
                        <i class="la la-fw la-plus"></i>@lang('Add New')
                    </button>
                </div>
            </div>

        </div>

        <div class="dashboard_box">
            <div class="col-lg-12">
                <div class="register_bottom mb-15">
                    <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"> <span
                            class="btn_title">Submit <i class="fa-solid fa-angles-right"></i></span></button>
                </div>
            </div>

        </div>
</div>
</form>
</div>

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


        var fileAdded = 0;
        $('.extraTicketAttachment').on('click', function () {
            if (fileAdded >= 3) {
                notify('error', 'You\'ve added maximum number of image');
                return false;
            }
            fileAdded++;
            $("#fileUploadsContainer").append(`
                    <div class="row">
                        <div class="col-12 mb-3 ">
                            <div class="property-listing-wrap">
                                <div class="file-upload-wrapper add-new-wraper "
                                data-text="@lang('Select your image!')">
                                <input type="file" name="images[]" id="inputAttachments"
                                    class="file-upload-field" />
                                </div>
                                <div class="propery-img-btn">
                                    <button type="button" class="property-btn extraTicketAttachmentDelete ms-0">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
        });

        $(document).on('click', '.extraTicketAttachmentDelete', function () {
            fileAdded--;
            $(this).closest('.row').remove();
        });


        $('.addAmenities').on('click', function () {
            var html = `
            <div class="col-md-12 data-amenities">
                        <div class="form-group">
                            <div class="row align-items-center mb-30">
                                <div class="col-md-12">
                                    <div class="add-new-wraper ">
                                        <input name="aminities[]" type="text" required placeholder="@lang('Enter Amenities or Property')">
                                        <span class="input-group-btn">
                                            <button class="btn btn--danger btn-lg removeAmenities w-100" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>`;
            $('.amenitiesField').append(html);
        });

        $(document).on('click', '.removeAmenities', function () {
            $(this).closest('.data-amenities').remove();
        });
    })(jQuery);
</script>
@endpush

