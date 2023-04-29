@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two custom-data-table">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Featured Limit')</th>
                                <th>@lang('Inquiries Limit')</th>
                                <th>@lang('Validity')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($plans as $item)
                           <tr>
                            <td>{{__($item->name)}}</td>
                            <td>{{showAmount($item->price)}}</td>
                            <td>{{__($item->inquiries_limit)}}</td>
                            <td>{{__($item->listing_limit)}}</td>
                            <td>{{__($item->validity)}}</td>
                            <td>
                                @if($item->status == 1)
                                <span class="badge badge--success">@lang('Active')</span>
                                @else
                                <span class="badge badge--warning">@lang('Inactive')</span>
                                @endif
                            </td>
                            <td>
                                <div class="button--group">
                                    <button type="button" class="btn btn-sm btn--primary updateCity"data-id="{{$item->id}}"data-name="{{$item->name}}" data-price="{{$item->price}}"data-inquiries_limit="{{$item->inquiries_limit}}" data-validity="{{$item->validity}}" data-listing_limit="{{$item->listing_limit}}" data-status="{{$item->status}}"><i class="las la-edit"></i></button>
                                </div>
                            </td>
                           </tr>
                           @empty
                           <tr>
                            <td class="text-muted text-center" colspan="100%">{{__($emptyMessage) }}</td>
                        </tr>
                           @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- card end -->
    </div>
</div>


{{-- Add METHOD MODAL --}}
<div id="cityModel" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Add')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.plan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label  for="name"> @lang('Plan Name'):</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('Plan Name')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Plan Price'):</label>
                        <input type="text" class="form-control" name="price" placeholder="@lang('Plan Price')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Inquiries Limit'):</label>
                        <input type="text" class="form-control" name="inquiries_limit" placeholder="@lang('Inquiries Limit')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Listing Limit'):</label>
                        <input type="text" class="form-control" name="listing_limit" placeholder="@lang('Listing Limit')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Validity'):</label>
                        <input type="text" class="form-control" name="validity" placeholder="@lang('Validity')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Status')</label>
                        <select class="form-control" name="status" id="" required>
                            <option value="1">@lang('Active')</option>
                            <option value="0">@lang('Inactive')</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Update METHOD MODAL --}}
<div id="updateCityModel" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Update')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.plan.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label  for="name"> @lang('Plan Name'):</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('Plan Name')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Plan Price'):</label>
                        <input type="text" class="form-control" name="price" placeholder="@lang('Plan Price')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Inquiries Limit'):</label>
                        <input type="text" class="form-control" name="inquiries_limit" placeholder="@lang('Inquiries Limit')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Listing Limit'):</label>
                        <input type="text" class="form-control" name="listing_limit" placeholder="@lang('Listing Limit')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Validity'):</label>
                        <input type="text" class="form-control" name="validity" placeholder="@lang('Validity')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Status')</label>
                        <select class="form-control" name="status" id="" required>
                            <option value="1">@lang('Active')</option>
                            <option value="0">@lang('Inactive')</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('breadcrumb-plugins')
<button type="button" class="btn btn-sm btn--primary addCity"><i class="las la-plus"></i>@lang('Add
    New')</button>
@endpush
@push('script')
<script>
    (function($){
        "use strict";

        $('.addCity').on('click', function() {
        $('#cityModel').modal('show');
    });


    $('.updateCity').on('click', function() {
        var modal = $('#updateCityModel');
        modal.find('input[name=id]').val($(this).data('id'));
        modal.find('input[name=name]').val($(this).data('name'));
        modal.find('input[name=price]').val($(this).data('price'));
        modal.find('input[name=inquiries_limit]').val($(this).data('inquiries_limit'));
        modal.find('input[name=listing_limit]').val($(this).data('listing_limit'));
        modal.find('input[name=validity]').val($(this).data('validity'));
        modal.find('select[name=status]').val($(this).data('status'));
        modal.modal('show');
    });
    })(jQuery);
</script>
@endpush
