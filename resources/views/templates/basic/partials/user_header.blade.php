@php
$contact = getContent('contact_us.content', true);
$social_icon = getContent('social_icon.element', false);
$languages = App\Models\Language::all();
@endphp
<!--=======-** Header Start **-=======-->
<header class="header_area header-transparent">
    <!-- <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6">
                    <div class="header_top_left">
                        <ul>
                            <li>
                                <a href="{{__($contact->data_values->contact_number)}}">
                                    <i class="fa-solid fa-phone"></i>
                                    {{__($contact->data_values->contact_number)}}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{__($contact->data_values->email_address)}}">
                                    <i class="fa-solid fa-envelope"></i>
                                    {{__($contact->data_values->email_address)}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-6  col-lg-7 col-md-6">
                    <div class="header_top_right">
                        <ul>
                            <li>
                                <div class="lang_select_wrapper mr-10">
                                    <select class="language-select">
                                        <option value="default" hidden="">@lang('Language')</option>
                                        @foreach($languages as $lang)
                                        <option value="{{ $lang->code }}" @if(Session::get('lang')===$lang->code)
                                            selected @endif>{{ __($lang->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li>

                            </li>
                            <li>
                                <ul class="list-unstyled">
                                    @foreach($social_icon as $item)
                                    <li class="ms-2"><a href="{{ __($item->data_values->url)}}"> <i></i>@php echo
                                            $item->data_values->social_icon
                                            @endphp </a></li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="header-main-menu" id="sticky-header">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="logo_wrapper">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                .time()) }}" alt="{{config('app.name')}}" alt="Image">
                            </a>
                            <div class="mobile-nav"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="menu_wrapper">
                        <div class="main_menu">
                            <nav id="mobile-nav">
                                <ul class="menu_list_box">
                                    <li><a class="{{ Route::is('user.home') ? 'active' : '' }}"
                                            href="{{route('user.home')}}">@lang('Dashboard')</a></li>
                                    @php
                                    $pages =
                                    App\Models\Page::where('tempname',$activeTemplate)->where('is_default',0)->get();
                                    @endphp
                                    @foreach($pages as $page)
                                    @if($page->slug != 'home' && $page->slug != 'blog' && $page->slug != 'news' && $page->slug != 'contact' &&
                                    $page->slug != 'listing')
                                    <li><a href="{{route('pages',[$page->slug])}}"
                                            class="{{ Route::is('pages',[$page->slug]) ? 'active' : '' }}"
                                            data-hover="{{__($page->name)}}">{{__($page->name)}}</a></li>
                                    @endif
                                    @endforeach
                                    <li><a href="{{route('properties')}}"
                                            class="{{ Route::is('properties') ? 'active' : '' }}">@lang('Investments')</a>
                                    </li>
                                    <li><a href="{{route('blog')}}" class='{{ Route::is('blog') ? 'active' : '' }}'>@lang('News')</a></li>
                                    <li><a href="{{route('contact')}}"
                                            class="{{ Route::is('contact') ? 'active' : '' }}">@lang('Contact')</a>
                                    </li>


                                    @auth
                                    <li>
                                        <a href="{{route('user.property.index')}}" class="theme_btn"><span
                                                class="btn_title"><i class="fa-solid fa-house"></i> @lang('Add
                                                Fundings')</span></a>
                                    </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--=======-** Header End **-=======-->
