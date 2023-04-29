@extends('admin.layouts.app')

@section('panel')
<div class="row gy-4">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Monthly Subscriptions Sale') (@lang('This year'))</h5>
                <div id="account-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Daily Logins') (@lang('Last 10 days'))</h5>
                <div id="login-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="row gy-4">
            <div class="col-sm-6">
                <a href="{{route('admin.deposit.list')}}">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Total Sales')</h6>
                                    <h3 class="m-b-0">{{ $general->cur_sym
                                        }}{{showAmount($deposit['total_deposit_amount'])}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.deposit.list')}}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Deposited Charge')</h6>
                                    <h3 class="m-b-0 text-white">{{ $general->cur_sym
                                        }}{{showAmount($deposit['total_deposit_charge'])}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon fas fa-percentage text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12">
                <div class="card p-3 rounded-3">
                    <div class="row g-0">
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-users"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.all')}}"></a>
                                    <h5>{{$widget['total_users']}}</h5>
                                    <span>@lang('Total Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4 ">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-user-check"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.active')}}"></a>
                                    <h5>{{$widget['verified_users']}}</h5>
                                    <span>@lang('Active Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-envelope"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.email.unverified')}}"></a>
                                    <h5>{{$widget['email_unverified_users']}}</h5>
                                    <span>@lang('Email Unverified')</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-home"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.property.index')}}"></a>
                                    <h5>{{ $widget['total_properties'] }}</h5>
                                    <span>@lang('Total Properties')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-spinner"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}"></a>
                                    <h5>{{$deposit['total_deposit_pending']}}</h5>
                                    <span>@lang('Pending Deposits')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-ban"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.rejected')}}">
                                    </a>
                                    <h5>{{$deposit['total_deposit_rejected']}}</h5>
                                    <span>@lang('Rejected Deposits')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">@lang('Recent Tickets')</h5>
                    <a href="{{route('admin.ticket.pending')}}" class="float-end" target="_blank">@lang('View all')</a>
                </div>
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light">
                        <thead>
                            <tr>
                                <th>@lang('Subject')</th>
                                <th>@lang('Status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newTickets as $item)
                            <tr>
                                <td>
                                    <a class="" href="{{ route('admin.ticket.view', $item->id) }}" class="fw-bold">
                                        @lang('Ticket')#{{ $item->ticket }} - {{ strLimit($item->subject,30) }} </a>
                                </td>
                                <td>
                                    @php echo $item->statusBadge; @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>

<script>
    "use strict";
    // [ account-chart ] start
    (function () {
        var options = {
            chart: {
                type: 'area',
                stacked: false,
                height: '310px'
            },
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            colors: ['#00adad', '#67BAA7'],
            series: [{
                name: '@lang("Deposits")',
                type: 'area',
                data: @json($depositsChart['values'])
    }],
    fill: {
        opacity: [0.85, 1],
                },
    labels: @json($depositsChart['labels']),
    markers: {
        size: 0
    },
    xaxis: {
        type: 'text'
    },
    yaxis: {
        min: 0
    },
    tooltip: {
        shared: true,
            intersect: false,
                y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return "$ " + y.toFixed(0);
                }
                return y;

            }
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                },
                function () {
                    return ''
                }
            ]
        }
    }
            }
    var chart = new ApexCharts(
        document.querySelector("#account-chart"),
        options
    );
    chart.render();
        }) ();

    // [ login-chart ] start
    (function () {
        var options = {
            series: [{
                name: "User Count",
                data: @json($userLogins['values'])
    }],
    chart: {
        height: '310px',
            type: 'area',
                zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    colors: ['#00adad'],
        labels: @json($userLogins['labels']),
    xaxis: {
        type: 'date',
            },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    }
        };

    var chart = new ApexCharts(document.querySelector("#login-chart"), options);
    chart.render();
    }) ();
</script>
@endpush
