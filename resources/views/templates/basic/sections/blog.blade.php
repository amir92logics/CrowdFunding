@php
$blog = getContent('blog.content', true);
$blogElements = getContent('blog.element', false);
@endphp
<!--=======-**  Blog Section Start **-=======-->
<section class="blog_area pt-100 pb-80 md-pt-60 md-pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="section_tilte style_2 pb-50">
                    <span>{{__($blog->data_values->top_heading)}}</span>
                    <h3 class="py-2">{{__($blog->data_values->heading)}}</h3>
                    <p>{{__($blog->data_values->subheading)}}</p>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row blog_active">
                    @foreach($blogElements as $item)
                    <div class="blog">
                        <div class="blog__img">
                            <a
                                href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                                <img src="{{ getImage(getFilePath('allImage').'/'.'blog/'.'thumb_'.@$item->data_values->blog_image)}}"
                                    alt="">
                            </a>
                            <span class="blog_date"> {{ showDateTime($item->created_at) }}</span>
                        </div>
                        <div class="blog__content">
                            <h4> <a
                                    href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                                    @if(strlen(__($item->data_values->title)) >40)
                                    {{substr( __($item->data_values->title), 0,50).'...' }}
                                    @else
                                    {{__($item->data_values->title)}}
                                    @endif</a> </h4>
                            <p>
                                {{ strLimit(strip_tags($item->data_values->description),50) }}
                            </p>
                            <div class="meta mt-4">
                                <div class="about_bottom text-start">
                                    <a class="style_1"
                                        href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}"><span
                                            class="btn_title blog-btn">{{__($item->data_values->button)}} <i
                                                class="fa-solid fa-right-long"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-**  Blog Section End **-=======-->