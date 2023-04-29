@php
$contact = getContent('contact_us.content', true);
$links = getContent('policy_pages.element');
$social_icon = getContent('social_icon.element', false);
@endphp
<!--=======-** Footer Start **-======-->
<footer>
    <div class="footer_area footer-bg pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-30">
                       <a href="{{route('home')}}">
                        <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'.time()) }}" alt="logo">
                       </a>
                        <p>
                            @if (strlen(__($contact->data_values->short_details)) > 200)
                            {{ substr(__($contact->data_values->short_details), 0, 250) . '...' }}
                            @else
                            {{ __($contact->data_values->short_details) }}
                            @endif

                        </p>
                        <ul class="footer-social-icons">
                            @foreach($social_icon as $item)
                            <li><a href="{{ __($item->data_values->url)}}">@php echo
                                    $item->data_values->social_icon
                                    @endphp </a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-30">
                        <h4 class="footer-widget__title">@lang('Company')</h4>
                        <div class="footer-widget__userful-link">
                            <ul>
                                <li><a href="{{ route('home') }}" target="_blank">@lang('Home')</a></li>
                                @foreach ($links as $link)
                                <li><a href="{{ route('policy.pages', [slug($link->data_values->title), $link->id]) }}">{{
                                    __($link->data_values->title) }}</a>
                                </li>
                                @endforeach
                                <li><a href="{{ route('cookie.policy') }}" target="_blank">@lang('Cookie Policy')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget  mb-30">
                        <h4 class="footer-widget__title">@lang('Others Pages')</h4>
                        <div class="footer-widget__userful-link">
                            <ul>
                                <li><a href="{{ route('plans') }}" target="_blank">@lang('Plans')</a></li>
                                <li><a href="{{ route('properties') }}" target="_blank">@lang('Properties')</a></li>
                                <li><a href="{{ route('blog') }}" target="_blank">@lang('Blog')</a></li>
                                <li><a href="{{ route('contact') }}" target="_blank">@lang('Contact')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-30">
                        <h4 class="footer-widget__title">@lang('Contact Us')</h4>
                        <div class="footer-widget__recent">
                            <div class="footer-widget__location">
                                <ul>
                                    <li> <i class="fa-solid fa-location-dot"></i><span>{{
                                            __($contact->data_values->contact_details) }}</span>
                                    </li>
                                    <li><i class="fa-solid fa-phone"></i><span><a href="javascript:void(0)">{{
                                                __($contact->data_values->contact_number) }}</a></span>
                                    </li>
                                    <li><i class="fa-solid fa-envelope"></i><span><a href="javascript:void(0)">{{
                                                __($contact->data_values->email_address) }}</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="single_item mb-10">
                            <div class="footer-bottom__copyright-text text-center">
                                @php echo ($contact->data_values->website_footer) @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=======-** Footer End **-======-->
<!--=======-** Scroll Btn Start  **-======-->
<div class="scroll-up scroll-one">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
    <i class="fa-solid fa-angle-up"></i>
</div>
<!--=======-** Scroll Btn End **-======-->
