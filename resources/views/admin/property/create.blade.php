@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.property.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border--primary mt-2">
                                <h5 class="card-header bg--primary">@lang('Property Space')</h5>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="title" class="font-weight-bold">@lang('Title')</label>
                                                <input type="text" name="title" id="title" value="{{old('title')}}"
                                                    class="form-control " placeholder="@lang('Enter Property Title')"
                                                    maxlength="255" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="property_type" class="font-weight-bold">@lang('Property
                                                    Type')</label>
                                                <select name="property_type" id="property_type" class="form-control"
                                                    required="">
                                                    <option value="" selected="" disabled="">@lang('Select One')
                                                    </option>
                                                    @foreach($propertyTypes as $propertyType)
                                                    <option value="{{$propertyType->id}}">{{__($propertyType->name)}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="city" class="font-weight-bold">@lang('City')</label>
                                                <select name="city" id="city" class="form-control" required="">
                                                    <option value="" selected="" disabled="">@lang('Select One')
                                                    </option>
                                                    @foreach($cities as $city)
                                                    <option value="{{$city->id}}"
                                                        data-locations="{{ json_encode($city->location) }}">
                                                        {{__($city->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="location" class="font-weight-bold">@lang('Location')</label>
                                                <select name="location" id="location" class="form-control" required="">
                                                    <option value="" selected="" disabled="">@lang('Select One')
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="type" class="font-weight-bold">@lang('Property
                                                    Purpose')</label>
                                                <select name="type" id="type" class="form-control" required="">
                                                    <option value="" selected="" disabled="">@lang('Select One')
                                                    </option>
                                                    <option value="1">@lang('For Sale')</option>
                                                    <option value="2">@lang('For Rent')</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="phone" class="font-weight-bold">@lang('Phone')</label>
                                                <input type="phone" name="phone" id="phone" value="{{old('phone')}}"
                                                    class="form-control " placeholder="@lang('Enter Phone')"
                                                    maxlength="40">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email" class="font-weight-bold">@lang('Email')</label>
                                                <input type="email" name="email" id="email" value="{{old('email')}}"
                                                    class="form-control " placeholder="@lang('Enter Email Address')"
                                                    maxlength="60">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="video_link" class="font-weight-bold">@lang('Property Video
                                                    Link')</label>
                                                <input type="text" name="video_link" id="video_link"
                                                    value="{{old('video_link')}}" class="form-control "
                                                    placeholder="@lang('https://www.youtube.com/embed/example')"
                                                    maxlength="255">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <label for="email" class="font-weight-bold">@lang('Image')</label>
                                                </div>
                                                <div class="col-9">
                                                    <div class="file-upload-wrapper"
                                                        data-text="@lang('Select your image!')">
                                                        <input type="file" name="images[]" id="inputAttachments"
                                                            class="file-upload-field" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <button type="button"
                                                        class="btn btn--white extraTicketAttachment ms-0"><i
                                                            class="fa fa-plus"></i></button>
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

                    {{-- //// --}}
                    <div class="col-lg-12">
                        <div class="card border--primary mt-2">
                            <h5 class="card-header bg--primary">@lang('Property Information')</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Room')</label>
                                            <input type="number" name="room" id="room" value="{{old('room')}}"
                                                class="form-control " placeholder="@lang('Enter room')">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Kitchen')</label>
                                            <input type="number" name="kitchen" id="kitchen" value="{{old('kitchen')}}"
                                                class="form-control " placeholder="@lang('Enter Kitchen')">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Bathroom')</label>
                                            <input type="number" name="bathroom" id="bathroom"
                                                value="{{old('bathroom')}}" class="form-control "
                                                placeholder="@lang('Enter Bathroom')">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Unit')</label>
                                            <input type="number" name="unit" id="unit" value="{{old('unit')}}"
                                                class="form-control " placeholder="@lang('Enter Unit')">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Floor')</label>
                                            <input type="number" name="floor" id="floor" value="{{old('floor')}}"
                                                class="form-control " placeholder="@lang('Enter Floor')">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Square Feet')</label>
                                            <input type="text" name="square_feet" id="square_feet"
                                                value="{{old('square_feet')}}" class="form-control "
                                                placeholder="@lang('Enter Square_feet')">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Latitude')</label>
                                            <input type="text" name="atitude" id="latitude" value="{{old('atitude')}}"
                                                class="form-control " placeholder="@lang('Enter Latitude')">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Longitude')</label>
                                            <input type="text" name="longitude" id="longitude"
                                                value="{{old('longitude')}}" class="form-control "
                                                placeholder="@lang('Enter Longitude')">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="font-weight-bold">@lang('Price')</label>
                                            <input type="number" name="price" id="price" value="{{old('price')}}"
                                                class="form-control " placeholder="@lang('Enter Price')" required>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea class="form-control trumEdit" rows="10" cols="30"
                                                name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>@lang('Floor Plan')</label>
                                            <div class="single-input">
                                                <img src="{{ getImage(getFilePath('property') .'/'.@$propertyInfo->floor_plan) }}" width="200" alt="image">
                                                <input type="file" name="floor_plan" >
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- /// --}}

                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="card border--primary mt-2">
                                <div class="freatures_amenites bg--primary">
                                    <h5 class="card-header">@lang('Amenities and Features (Optional)')</h5>

                                </div>
                                <div class="card-body">
                                    <div class="row amenitiesField">
                                        <div class="col-md-12 data-amenities">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-30">
                                                    <div class="col-md-10">
                                                        <input name="aminities[]" class="form-control " type="text"
                                                            required placeholder="@lang('Enter Amenities or Features')">
                                                    </div>
                                                    <div class="col-md-2 mt-md-0 mt-2 text-right">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn--danger btn-lg removeAmenities w-100"
                                                                type="button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row text-end">
                                        <div class="col-lg-12 mt-3">
                                            <button type="button" class="add-new addAmenities">
                                                <i class="la la-fw la-plus"></i>@lang('Add New')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row text-end">
                <div class="col-lg-12 ">
                    <div class="form-group float-end p-3">
                        <button type="submit" class="btn btn--primary btn-block btn-lg"><i
                                class="fa fa-fw fa-paper-plane"></i> @lang('Create Property')</button>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>

</div>



@endsection
@push('breadcrumb-plugins')
<a href="{{route('admin.property.index')}}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
        class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

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
                        <div class="col-9 mb-3">
                            <div class="file-upload-wrapper" data-text="@lang('Select your image!')"><input type="file" name="images[]" id="inputAttachments" class="file-upload-field"/></div>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn text--danger extraTicketAttachmentDelete"><i class="la la-times ms-0"></i></button>
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
                        <div class="col-md-10">
                            <input name="aminities[]" class="form-control " type="text" required placeholder="@lang('Enter Amenities or Features')">
                        </div>
                        <div class="col-md-2 mt-md-0 mt-2 text-right">
                            <span class="input-group-btn">
                                <button class="btn btn--danger btn-lg removeAmenities w-100" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </span>
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

@push('style')
<style>
    button.add-new {
        background: 0;
        color: #00adad;
    }

    .freatures_amenites h5 {
        color: #fff;
    }

    .freatures_amenites {
        display: flex;
        justify-content: space-between;
    }
</style>
@endpush