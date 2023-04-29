@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <form action="{{route('user.property.update',$property->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="dashboard_box">
            <h4 class="title mb-25">@lang('Update property')</h4>
            <div class="dashboard_body">
                <div class="row">
                    <div class="login_wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Property Title')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="title"
                                            value="{{__($property->title)}}" placeholder="@lang('Property Title')"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Phone')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="phone"
                                            value="{{__($property->phone)}}" placeholder="@lang('Enter Your Phone')"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Email')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="email"
                                            value="{{__($property->email)}}" placeholder="@lang('Enter Your Email')"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Video link')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="video_link"
                                            value="{{__($property->video_link)}}"
                                            placeholder="@lang('Enter Your video link')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Property type')</p>
                                    <select name="property_type" class="all_select">
                                        @foreach($propertyTypes as $propertyType)
                                        <option value="{{$propertyType->id}}" {{$propertyType->id ==
                                            $property->property_type ? 'selected' : null }} >{{__($propertyType->name)}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('City')</p>
                                    <select name="city" id="city" required class="all_select">
                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}"
                                            data-locations="{{ json_encode($city->location) }}" {{$city->id ==
                                            $property->city_id ? 'selected' : null }} >{{__($city->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Location')</p>
                                    <select name="location" id="location" class="all_select" required>
                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="nice_select_wrapper mb-15 style_1">
                                    <p>@lang('Property Purpose')</p>
                                    <select name="type" class="all_select">
                                        <option value="1" @if($property->type == 1) selected @endif>@lang('For Sale')
                                        </option>
                                        <option value="2" @if($property->type == 2) selected @endif>@lang('For Rent')
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Room')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="room"
                                            value="{{__(@$propertyInfo->room)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Kitchen')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="kitchen"
                                            value="{{__(@$propertyInfo->kitchen)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Bathroom')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="bathroom"
                                            value="{{__(@$propertyInfo->bathroom)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Unit')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="unit"
                                            value="{{__(@$propertyInfo->unit)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Floor')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="floor"
                                            value="{{__(@$propertyInfo->floor)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Square Feet')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="square_feet"
                                            value="{{__(@$propertyInfo->square_feet)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Latitude')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="latitude"
                                            value="{{__(@$propertyInfo->latitude)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Longitude')</label>
                                    <div class="single-input">
                                        <input type="text" id="property_title" name="longitude"
                                            value="{{__(@$propertyInfo->longitude)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group profile mb-15">
                                    <label for="property_title">@lang('Price')</label>
                                    <div class="single-input">
                                        <input type="number" id="property_title" name="price"
                                            value="{{__(@$propertyInfo->price)}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group profile mb-20">
                                    <label for="new_pass">@lang('Property Description')</label>
                                    <div class="single-input">
                                        <textarea class="trumEdit" name="description" id="new_pass" cols="30"
                                            rows="10">{{__(@$propertyInfo->description)}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group profile mb-15">
                                    <label>@lang('Floor Plan')</label>
                                    <div class="single-input">
                                        <img src="{{ getImage(getFilePath('property') .'/'.@$propertyInfo->floor_plan) }}" width="200" alt="image" class="mb-3">
                                        <input type="file" name="floor_plan" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row form-group profile property-img">
                                    <div class="col-12">
                                        <label for="proeerty_salce_price">@lang('Property Image')</label>
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

                            <div class="col-lg-12">
                                <div class="row">
                                    @if($propertyImage)
                                    @foreach($propertyImage as $image)
                                    <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                                        <div class="image-wrap">
                                            <div class="thumb">
                                                <img src="{{ getImage(getFilePath('property').'/'.@$image->image)}}"
                                                    alt="" style="">
                                                <a class="crose-icon imageRemove" href="javascript:void(0)"
                                                    data-id="{{$image->id}}">X</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard_box">
            <h4 class="title mb-25">@lang('Property Aminities')</h4>
            <div class="row amenitiesField">
                <div class="col-md-12 data-amenities">
                    <div class="form-group">
                        @if(@$propertyInfo->aminity)
                        @foreach(json_decode(@$propertyInfo->aminity) as $value )
                        <div class="row align-items-center mb-30">
                            <div class="col-md-12">
                                <div class="add-new-wraper ">
                                    <input name="aminities[]" type="text" required
                                        placeholder="@lang('Enter Amenities or Features')" value="{{ $value }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn--danger btn-lg removeAmenities w-100" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row text-end">
                <div class="col-lg-12 mt-3">
                    <button type="button" class="btn bg--primary addAmenities">
                        <i class="la la-fw la-plus"></i>@lang('Add New')
                    </button>
                </div>
            </div>
        </div>
        <div class="dashboard_box">
            <div class="col-lg-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" {{ $property->status==1 ? 'checked':
                    ''}} id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        @lang('Active')
                    </label>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="register_bottom mb-15">
                    <button type="submit" class="theme_btn style_1 dashborad_btn money-btn"> <span
                            class="btn_title">@lang('Submit') <i class="fa-solid fa-angles-right"></i></span></button>
                </div>
            </div>
        </div>
</div>
</form>
</div>


{{-- modal --}}
<div class="modal fade" id="imageRemoveBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Image Delete Confirmation')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('user.property.image.delete')}}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to remove this image?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
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

        $('select[name=city]').change(function () {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locationId = {{ $property -> location_id
        }};
    var locations = $('select[name=city] :selected').data('locations');
    var html = '';
    locations.forEach(function myFunction(item, index) {
        if (item.id == locationId) {
            html += `<option value="${item.id}" selected>${item.name}</option>`
        } else {
            html += `<option value="${item.id}">${item.name}</option>`
        }
    });
    $('select[name=location]').append(html);
    }).change();


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
                                    <button type="button" class=" property-btn extraTicketAttachmentDelete ms-0">
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
        $(this).closest('.row').remove();
    });

    $('.imageRemove').on('click', function () {
        var modal = $('#imageRemoveBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
    }) (jQuery);
</script>
@endpush
