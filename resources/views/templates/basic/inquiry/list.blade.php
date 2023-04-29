@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box">
        <h4 class="title mb-25">@lang('Property Queries')</h4>
        <div class="dashboard_body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table my_custom_table" id="table_res">
                        <thead>
                            <tr>
                                <th>@lang('Property name')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Reply')</th>
                            </tr>
                        </thead>

                        <tbody>
                           @forelse ($inquiries as $item)
                           <tr>
                            <td>{{__($item->property->title)}}</td>
                            <td>{{showDateTime(($item->created_at))}}</td>
                            <td><a href="{{route('user.inquiry.replies',$item->id)}}"> <i class="fa-solid fa-eye"></i></a></td>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="pagination-wrapper mt-30 mb-30 md-mt-10">
                        @if ($inquiries->hasPages())
                        <div class="py-4">
                            {{ paginateLinks($inquiries) }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
