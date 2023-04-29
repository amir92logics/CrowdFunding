@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <div class="dashboard_box">
        <div class="row justify-content-center">
            <div class="">
                <div class="">
                        <h4 class="card-title">{{__($pageTitle)}}</h4>
                    <div class="card-body  ">
                        <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="text-center mt-2">@lang('You have requested') <b class="text-success">{{ showAmount($data['amount'])  }} {{__($general->cur_text)}}</b> , @lang('Please pay')
                                        <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }} </b> @lang('for successful payment')
                                    </p>
                                    <h4 class="text-center mb-4">@lang('Please follow the instruction below')</h4>

                                    <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>

                                </div>

                                <x-custom-form identifier="id" identifierValue="{{ $gateway->form_id }}"></x-custom-form>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="theme_btn style_1"><span class="btn_title">@lang('Pay Now')<i class="fa-solid fa-angles-right"></i></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
