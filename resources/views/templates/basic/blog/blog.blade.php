@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Blog Start **-=======-->
<section class="features_area pt-20 pb-80 md-pt-60 md-pb-30">
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    @foreach($blogs as $item)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="blog mb-30">
                            <div class="blog__img">
                                <a
                                    href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                                    <img src="{{ getImage(getFilePath('allImage').'/'.'blog/'.@$item->data_values->blog_image)}}"
                                        alt="">
                                </a>
                                <span class="blog_date">{{ showDateTime($item->created_at) }}</span>
                            </div>
                            <div class="blog__content">
                                <h4> <a
                                        href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                                        @if(strlen(__($item->data_values->title)) >120)
                                        {{substr( __($item->data_values->title), 0,150).'...' }}
                                        @else
                                        {{__($item->data_values->title)}}
                                        @endif
                                    </a>
                                </h4>
                                <p>
                                    {{ strLimit(strip_tags($item->data_values->description),120) }}
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
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pagination-wrapper mt-30 mb-30 md-mt-10">
                                @if ($blogs->hasPages())
                                <div class="py-4">
                                    {{ paginateLinks($blogs) }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="col-xl-4 col-lg-4 mt-15 col-md-12 car">
                <div class="widget_box mb-30 single_featured">
                    <div class="widget_box_header">
                        <h4 class="mb-20">@lang('Recent Posts')
                        </h4>
                    </div>
                    @foreach($latests as $item)
                    <div class="popular_posts mb-20">
                        <div class="row gx-3">
                            <div class="col-3">
                                <a
                                    href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                                    <img src="{{ getImage(getFilePath('allImage').'/'.'blog/'.@$item->data_values->blog_image)}}"
                                        class="flex-shrink-0 me-3" alt="Image">
                                </a>
                            </div>
                            <div class="col-9">
                                <div class="detail">
                                    <h4>
                                        <a
                                            href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">{{__($item->data_values->title)}}</a>
                                    </h4>
                                    <div class="listing-post-meta">
                                        <a href="javascript:void(0)">{{ showDateTime($item->created_at) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="widget_box mb-30 single_featured">
                    <div class="widget_box_header">
                        <h4 class="mb-20">@lang('Support')</h4>
                    </div>
                    <!-- <div class="helping-center">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Address')</h4>
                            <p>{{__($contacts->data_values->contact_details)}}</p>
                        </div>
                    </div>
                    <div class="helping-center">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Phone')</h4>
                            <p><a href="javascript:void(0)">{{__($contacts->data_values->contact_number)}}</a> </p>
                        </div>
                    </div>
                    <div class="helping-center">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="adress">
                            <h4>@lang('Email')</h4>
                            <p><a href="javascript:void(0)">{{__($contacts->data_values->email_address)}}</a> </p>
                        </div>
                    </div> -->
                </div>



            </aside>
        </div>

    </div>
</section>
<!--=======-**  Blog End **-=======-->
@endsection
