@extends($activeTemplate.'layouts.frontend')
@section('content')
<!--=======-**  Blog Start **-=======-->
<section class="features_area pt-20 pb-80 md-pt-20 md-pb-30">
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="blog mb-30">
                            <div class="blog__img ">
                                <img src="{{ getImage(getFilePath('allImage').'/'.'blog/'.@$blog->data_values->blog_image)}}"
                                    alt="">
                                    
                            </div>
                            <div class="d-flex justify-content-between my-3">
                                <ul class="meta">
                                    <li><i class="fa-solid fa-calendar-days text--primary"></i> {{ showDateTime($blog->created_at) }}
                                    </li>
                                </ul>
                                <ul class="social-share mt-0">
                                    <li><a href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{slug($blog->data_values->title)}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?status={{slug($blog->data_values->title)}}+{{ Request::url() }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{slug($blog->data_values->title)}}&source=propertee"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="blog__content">
                                <h4 class="mb-10">
                                    @if(strlen(__($blog->data_values->title)) >120)
                                    {{substr( __($blog->data_values->title), 0,150).'...' }}
                                    @else
                                    {{__($blog->data_values->title)}}
                                    @endif</h4>

                                <div class="blog_text mb-30">
                                    <p class="mb-10"> @php echo $blog->data_values->description; @endphp</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-xl-4 col-lg-4 col-md-12 car mt-10">
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
