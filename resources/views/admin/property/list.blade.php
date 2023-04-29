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
                                <th>@lang('Title - City - Location')</th>
                                <th>@lang('Phone - Email')</th>
                                <th>@lang('Price - Square Feet')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($properties as $propertie)
                           <tr>
                            <td data-label="@lang('Title - City - Location')">
                                <span class="font-weight-bold">{{__($propertie->title)}}</span><br>
                                <span> {{__($propertie->location->name)}}, {{__($propertie->city->name)}} </span>
                            </td>
                            <td data-label="@lang('Owern Name - Phone - Email')">
                                <span class="font-weight-bold">{{__($propertie->phone)}}</span><br>
                                <span>{{__($propertie->email)}}</span>
                            </td>
                           <td>
                            <span>{{showAmount((@$propertie->propertyInfo->price))}} {{$general->cur_text}}</span>
                            <br>
                            <span>{{(@$propertie->propertyInfo->square_feet)}} @lang('square feet')</span>
                        </td>
                           <td data-label="@lang('Status')">
                            @if($propertie->status == 1)
                                <span class="badge badge--success">@lang('Active')</span>
                            @elseif($propertie->status == 2)
                                <span class="badge badge--danger">@lang('Cancel')</span>
                            @elseif($propertie->status == 0)
                                <span class="badge badge--primary">@lang('Pending')</span>
                            @endif
                        </td>
                        <td data-label="@lang('Action')">

                            <a href="{{route('admin.property.info.edit',$propertie->id)}}" class="icon-btn btn--primary ml-1" data-toggle="tooltip" data-original-title="@lang('Edit')"><i class="las la-pen"></i></a>
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


@endsection
@push('breadcrumb-plugins')
<a href="{{route('admin.property.create')}}" class="btn btn-sm btn--primary addCity"><i class="las la-plus"></i>@lang('Add
    New')</a>
@endpush

