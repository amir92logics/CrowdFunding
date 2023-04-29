@php
    $counter =getContent('counter.element', false);

@endphp
 <!--=======-** Counter Start **-=======-->
 <section class="counter-area  pt-100 pb-70 md-pt-60 md-pb-30">
    <div class="container">
        <div class="row">
           @foreach ($counter as $item)
           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="single_count text-center mb-30">
                <i>@php echo $item->data_values->counter_icon
                    @endphp </i>
                <span class="counter">{{__($item->data_values->counter_digit)}}</span>
                <h3>{{__($item->data_values->title)}}</h3>
            </div>
          </div>
           @endforeach
        </div>
    </div>
</section>
<!--=======-** Counter End **-=======-->
