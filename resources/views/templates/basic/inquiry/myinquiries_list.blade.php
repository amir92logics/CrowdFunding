@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box">
        <h4 class="title mb-25">@lang('My Queries')</h4>
        <div class="dashboard_body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table my_custom_table" id="table_res">
                        <thead>
                            <tr>
                                <th>@lang('Message')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Reply')</th>
                            </tr>
                        </thead>

                        <tbody>
                           @forelse ($myinquiries as $item)
                           <tr>
                            <td>{{__($item->inquiry)}}</td>
                            <td>{{showDateTime(($item->created_at))}}</td>
                            <td><a href="{{route('user.inquiry.myinquiries.reply',$item->id)}}"> <i class="fa-solid fa-eye"></i></a></td>
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
