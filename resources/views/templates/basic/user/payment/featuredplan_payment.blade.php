@extends($activeTemplate.'layouts.master')
@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box">
    <div class="row justify-content-center">
            <form action="{{route('user.deposit.insert')}}" method="post">
                @csrf
                <input type="hidden" name="method_code">
                <input type="hidden" name="currency">
                <input type="hidden" name="plan_id" value="{{$featuredPlan->id}}">
                <input type="hidden" name="is_plan" value="1">
                <input type="hidden" name="property_id" value="{{$property_id}}">
                <div class="">
                        <h4 class="card-title">@lang('Payment')</h4>
                    <div class="card-body">
                        <div class="form-group profile mb-25">
                            <div class="nice_select_wrapper mb-30 style_1">
                                <label for="inputSelect">@lang('Payment Gateway')</label>
                                <select name="gateway" required class="all_select">
                                    <option value="">@lang('Select Gateway')</option>
                                    @foreach($gatewayCurrency as $data)
                                    <option value="{{$data->method_code}}" @selected(old('gateway')==$data->method_code)
                                        data-gateway="{{ $data }}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group profile mb-25">
                            <label for="inputSelect">@lang('Plan Price')</label>
                            <div class="single-input">
                                <input type="number" step="any" name="amount"
                                    value="{{$featuredPlan->price}}" readonly >
                            </div>
                        </div>

                        <div class="mt-3 preview-details d-none">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Limit')</span>
                                    <span><span class="min fw-bold">0</span> {{__($general->cur_text)}} - <span
                                            class="max fw-bold">0</span> {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Charge')</span>
                                    <span><span class="charge fw-bold">0</span> {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Payable')</span> <span><span class="payable fw-bold"> 0</span>
                                        {{__($general->cur_text)}}</span>
                                </li>
                                <li class="list-group-item justify-content-between d-none rate-element">

                                </li>
                                <li class="list-group-item justify-content-between d-none in-site-cur">
                                    <span>@lang('In') <span class="base-currency"></span></span>
                                    <span class="final_amo fw-bold">0</span>
                                </li>
                                <li class="list-group-item justify-content-center crypto_currency d-none">
                                    <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and
                                        final value will Show on next step')</span>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="theme_btn style_1 mt-3"><span class="btn_title">@lang('Submit')<i class="fa-solid fa-angles-right"></i></span></button>
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
@endsection

@push('script')
<script>
    (function ($) {
        "use strict";
        $('select[name=gateway]').change(function () {
            if (!$('select[name=gateway]').val()) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            var resource = $('select[name=gateway] option:selected').data('gateway');
            var fixed_charge = parseFloat(resource.fixed_charge);
            var percent_charge = parseFloat(resource.percent_charge);
            var rate = parseFloat(resource.rate)
            if (resource.method.crypto == 1) {
                var toFixedDigit = 8;
                $('.crypto_currency').removeClass('d-none');
            } else {
                var toFixedDigit = 2;
                $('.crypto_currency').addClass('d-none');
            }
            $('.min').text(parseFloat(resource.min_amount).toFixed(2));
            $('.max').text(parseFloat(resource.max_amount).toFixed(2));
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            if (amount <= 0) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            $('.preview-details').removeClass('d-none');
            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
            $('.charge').text(charge);
            var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
            $('.payable').text(payable);
            var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
            $('.final_amo').text(final_amo);
            if (resource.currency != '{{ $general->cur_text }}') {
                var rateElement = `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{__($general->cur_text)}} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                $('.rate-element').html(rateElement)
                $('.rate-element').removeClass('d-none');
                $('.in-site-cur').removeClass('d-none');
                $('.rate-element').addClass('d-flex');
                $('.in-site-cur').addClass('d-flex');
            } else {
                $('.rate-element').html('')
                $('.rate-element').addClass('d-none');
                $('.in-site-cur').addClass('d-none');
                $('.rate-element').removeClass('d-flex');
                $('.in-site-cur').removeClass('d-flex');
            }
            $('.base-currency').text(resource.currency);
            $('.method_currency').text(resource.currency);
            $('input[name=currency]').val(resource.currency);
            $('input[name=method_code]').val(resource.method_code);
            $('input[name=amount]').on('input');
        });
        $('input[name=amount]').on('input', function () {
            $('select[name=gateway]').change();
            $('.amount').text(parseFloat($(this).val()).toFixed(2));
        });
    })(jQuery);
</script>
@endpush
