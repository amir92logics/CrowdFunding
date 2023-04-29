@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">

        <div class="dashboard_box mb-30">
            <h4 class="title mb-25">@lang('My Listings')</h4>
            <div class="dashboard_body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table my_custom_table" id="table_res">
                            <thead>
                                <tr>
                                    <th>@lang('Property - Location')</th>
                                    <th>@lang('Price - Square Feet')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($properties as $propertie)
                                <tr>
                                    <td>
                                        <span class="fw-bold"><a href="{{ route('property.details',[ slug($propertie->title), $propertie->id]) }}">{{__($propertie->title)}}</a></span><br>
                                        <span> {{__($propertie->location->name)}}, {{__($propertie->city->name)}} </span>
                                    </td>

                                    <td>
                                        <span class="fw-bold">{{showAmount((@$propertie->propertyInfo->price))}} {{$general->cur_text}}</span>
                                        <br>
                                        <span>{{(@$propertie->propertyInfo->square_feet)}} @lang('square feet')</span>
                                    </td>
                                    <td >
                                        @php echo $propertie->statusBadge($propertie->status); @endphp
                                    </td>
                                    <td><a href="{{route('user.property.edit',$propertie->id)}}"> <i class="fa fa-pencil"></i> </a></td>
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
                @if($properties->hasPages())
                <div class="card-footer text-end">
                    {{ $properties->links() }}
                </div>
                @endif
            </div>
    </div>

</div>


@endsection
