@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="dashboard_box ">
                <div class="buttorn_wrapper text-end mb-4">
                    <a href="{{route('ticket.open') }}" class="theme_btn style_1 dashborad_btn money-btn"><span class="btn_title"><i class="fa-solid fa-plus"></i>@lang('New Ticket')</span></i></a>
                </div>
                <div class="dashboard_body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table my_custom_table" id="table_res">
                                <thead>
                                    <tr>
                                        <th>@lang('Subject')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Priority')</th>
                                        <th>@lang('Last Reply')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($supports as $support)
                                    <tr>
                                        <td> <a href="{{ route('ticket.view', $support->ticket) }}" class="fw-bold"> [@lang('Ticket')#{{ $support->ticket }}] {{ __($support->subject) }} </a></td>
                                        <td>
                                            @php echo $support->statusBadge; @endphp
                                        </td>
                                        <td>
                                            @if($support->priority == 1)
                                                <span class="badge bg-dark">@lang('Low')</span>
                                            @elseif($support->priority == 2)
                                                <span class="badge bg-success">@lang('Medium')</span>
                                            @elseif($support->priority == 3)
                                                <span class="badge bg-primary">@lang('High')</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                        <td>
                                            <a href="{{ route('ticket.view', $support->ticket) }}" class="btn btn--base btn-sm">
                                                <i class="fa fa-desktop"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{$supports->links()}}

        </div>
    </div>
</div>

@endsection
