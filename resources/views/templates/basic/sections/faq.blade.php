@php
$faq = getContent('faq.content', true);
$faqElements = getContent('faq.element', false);
@endphp

<!--=======-** Frequently Question Start **-=======-->
<section class="faqs-section pt-100 pb-70 pb-80 md-pt-80 md-pb-30">
    <div class="container">
        <div class="section_tilte text-center pb-50">
            <span>{{__($faq->data_values->top_heading)}}</span>
            <h3 class="py-2">{{__($faq->data_values->heading)}}</h3>
            <p class="subheading">{{__($faq->data_values->subheading)}}</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="ask-question-wrap">
                    <div class="collapse-wrappper mb-30">
                        <div class="accordion" id="accordionExample">
                            @foreach($faqElements as $item)
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo{{ $loop->index }}">
                                    <h2 class="mb-0">
                                        <a href="#" class="accordion-button {{ $loop->index == 0 ? '' : 'collapsed' }}"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo{{ $loop->index }}"
                                            aria-expanded="true">
                                            {{__($item->data_values->question)}}
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseTwo{{ $loop->index }}"
                                    class="accordion-collapse collapse {{ $loop->index == 0 ? 'show' : '' }}">
                                    <div class="accordion-body">
                                        {{ strLimit(strip_tags($item->data_values->answer),350) }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq_thumb_wrap mb-30">
                    <img class="img-fluid"
                        src="{{ getImage(getFilePath('allImage').'/'.'faq/'.@$faq->data_values->faq_image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-** Frequently Question End **-=======-->