@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="buttorn_wrapper text-end mb-4">
                <a href="{{route('ticket.open') }}" class="theme_btn style_1 dashborad_btn money-btn"><span class="btn_title"><i class="fa-solid fa-plus"></i>@lang('New Ticket')</span></i></a>
            </div>
            <div class="dashboard_profile__details">
                <div>
                    <h4 class="text-black p-3">{{ __($pageTitle) }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('ticket.store')}}" method="post" enctype="multipart/form-data"
                        onsubmit="return submitUserForm();">
                        @csrf
                        <div class="modal_body_wrapper">
                        <div class="row">
                            <div class="form-group profile col-md-6 mb-15">
                                <label for="first_name">@lang('Name')</label>
                                <div class="single-input">
                                    <input  type="text" name="name" value="{{@$user->firstname . ' '.@$user->lastname}}" required readonly>
                                    <i class="fa-regular fa-user"></i>
                                </div>
                            </div>

                            <div class="form-group profile col-md-6 mb-15">
                                <label for="first_name">@lang('Email')</label>
                                <div class="single-input">
                                    <input type="email" name="email" value="{{@$user->email}}" required readonly>
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                            </div>


                            <div class="form-group profile col-md-6 mb-15">
                                <label for="first_name">@lang('Subject')</label>
                                <div class="single-input">
                                    <input ype="text" name="subject" value="{{old('subject')}}" required >
                                    <i class="fa-regular fa-comment"></i>
                                </div>
                            </div>

                            <div class="form-group profile col-md-6 mb-15">
                                <div class="nice_select_wrapper mb-30 style_1">
                                    <label class="state">@lang('Priority')<span class="text-danger">*</span></label>
                                    <select name="priority" required class="all_select">
                                        <option value="3">@lang('High')</option>
                                        <option value="2">@lang('Medium')</option>
                                        <option value="1">@lang('Low')</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group profile col-12 mb-15">
                                <label for="first_name">@lang('Subject')</label>
                                <div class="single-input">
                                    <textarea name="message" id="inputMessage" rows="6"
                                    required>{{old('message')}}</textarea>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="text-end">
                                <a type="button" class="addFile"><span class="text-danger"><i class="fa-solid fa-plus"></i>@lang('Add New File')</span></i></a>
                            </div>
                            <div class="file-upload">
                                <label class="form-label">@lang('Attachments')</label> <small
                                    class="text-danger">@lang('Max 5 files can be uploaded'). @lang('Maximum upload size
                                    is') {{ ini_get('upload_max_filesize') }}</small>
                                <input type="file" name="attachments[]" id="inputAttachments"
                                    class="form-control form--control mb-2" />
                                <div id="fileUploadsContainer"></div>
                                <p class="ticket-attachments-message text-muted">
                                    @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'),
                                    .@lang('pdf'), .@lang('doc'), .@lang('docx')
                                </p>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="buttorn_wrapper text-end mb-4">
                                <button type="submit" id="recaptcha" class="theme_btn style_1 dashborad_btn money-btn"><span class="btn_title"><i
                                            class="fa fa-paper-plane"></i>&nbsp;@lang('Save')</span></i></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('style')
<style>
    .input-group-text:focus {
        box-shadow: none !important;
    }
</style>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        var fileAdded = 0;
        $('.addFile').on('click', function () {
            if (fileAdded >= 4) {
                notify('error', 'You\'ve added maximum number of file');
                return false;
            }
            fileAdded++;
            $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control form--control" required />
                        <button class="input-group-text btn-danger remove-btn"><i class="las la-times">x</i></button>
                    </div>
                `)
        });
        $(document).on('click', '.remove-btn', function () {
            fileAdded--;
            $(this).closest('.input-group').remove();
        });
    })(jQuery);
</script>
@endpush
