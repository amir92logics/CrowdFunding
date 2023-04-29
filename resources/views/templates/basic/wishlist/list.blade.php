@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
     <div class="dashboard_box mb-30">
        <h4 class="title mb-25">@lang('Favourite Listings')</h4>
        <div class="dashboard_body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table my_custom_table" id="table_res">
                        <thead>
                            <tr>
                                <th>@lang('Property - Location')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Square Feet')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($property as $item)

                            <tr>
                               <td>
                                <a href="{{ route('property.details',[ slug($item->title), $item->id]) }}" class="fw-bold">{{__($item->title)}}</a><br>
                                <span> {{__($item->location->name)}}, {{__($item->city->name)}} </span>
                            </td>
                                <td>
                                    <span class="fw-bold">{{showAmount((@$item->propertyInfo->price))}} {{$general->cur_text}}</span>

                                </td>

                                <td>
                                    <span class="fw-bold">{{(@$item->propertyInfo->square_feet)}} @lang('square feet')</span>
                                </td>
                            </tr>
                            @empty
                            <td>
                                {{__($emptyMessage)}}
                            </td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
