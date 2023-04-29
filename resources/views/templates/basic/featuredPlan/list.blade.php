@extends($activeTemplate.'layouts.frontend')
@php
$plan = getContent('plan.content', true);
@endphp
@section('content')
<!--=======-**  Plan  Start **-=======-->
<section class="primary-linear-bg pt-100 pb-60 md-pt-60 md-pb-30">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      @foreach($featuredPlans as $item)
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="single_plan text-center mb-30 ">
          <div class="single_plan__head">
            <h4>{{__($item->title)}}</h4>
            <span>{{__($general->cur_sym)}}{{showAmount(__($item->price))}}</span>
          </div>
          <div class="single_plan__body mb-35">
            <ul>
              <li><i class="fa-solid fa-check"></i>{{__($item->validity)}} @lang('Days Validity')</li>

            </ul>
          </div>
          <div class="single_plan__foter mb-20">
            <form action="{{route('user.featured.plan.payment', $item->id)}}" method="get">
                @csrf
                <input type="hidden" name="property_id" value="{{$property->id}}">

            <button type="submit" class="theme_btn style_1"><span class="btn_title">@lang('Buy
                Now ')<i class="fa-solid fa-angles-right"></i></span> </button>
          </form>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</section>
<!--=======-**  Plan  End **-=======-->
@endsection


@push('style')
<style>
  .package-disabled {
    opacity: 0.5;
  }
</style>
@endpush
