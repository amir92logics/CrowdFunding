@php
$user = auth()->user();
@endphp
<div class="col-xl-4 col-lg-4 mb-5">
    <div class="dashboard_profile">
        <div class="dashboard_profile__header dashboard_header_bg">
            <div class="dashboard_profile_wrap">
                <div class="profile_photo">

                    <img src="{{ getImage(getFilePath('UserProfile').'/'.$user->image,getFileSize('UserProfile')) }}"
                        alt="agent">
                </div>
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="photo_upload">
                        <label for="file_upload"><i class="fa fa-upload"></i> @lang('Choose Photo')</label>
                        <input id="file_upload" type="file" name="image" class="upload_file">
                    </div>
                    <div class="photo_upload">
                        <button type="submit" class="profile_up_btn">@lang('Upload')</button>
                    </div>
                </form>

                <h3>{{ __($user->firstname) }} {{ $user->lastname }}</h3>
                <p class="user_email">{{ __($user->email) }}</p>
            </div>
        </div>

        <div class="dashboard_profile__details">
            <ul>
                <li>
                    <a href="{{ route('user.home') }}" class='{{ Route::is('user.home') ? 'active' : '' }}'>
                        <i class="fa fa-map-marker"></i> @lang('Dashboard')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.property.index') }}" class='{{ Route::is('user.property.index') ? 'active' : '' }}'>
                        <i class="fa fa-plus"></i>@lang('Add Listing')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.property.list') }}" class='{{ Route::is('user.property.list') ? 'active' : '' }}'>
                        <i class="fa fa-list"></i>@lang('My Listings')
                    </a>
                </li>
                <li>
                    <a href="{{route('user.property.list.wishlist')}}" class='{{ Route::is('user.property.list.wishlist') ? 'active' : '' }}'>
                        <i class="fa fa-heart"></i>@lang('Favourite Listings')
                    </a>
                </li>
                <li>
                    <a href="{{ route('ticket') }}" class='{{ Route::is('ticket') ? 'active' : '' }}'>
                        <i class="fas fa fa-life-ring"></i>@lang('My Tickets')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.inquiry.list') }}" class='{{ Route::is('user.inquiry.list') ? 'active' : '' }}'>
                        <i class="fa-regular fa-message"></i>@lang('Investment Queries')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.inquiry.myinquirieslist') }}" class='{{ Route::is('user.inquiry.myinquirieslist') ? 'active' : '' }}'>
                        <i class="fa-regular fa-message"></i>@lang('My Queries')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.profile.setting') }}" class='{{ Route::is('user.profile.setting') ? 'active' : '' }}'>
                        <i class="fa fa-user"></i>@lang('Profile')
                    </a>
                </li>


                <li>
                    <a href="{{ route('user.change.password') }}" class='{{ Route::is('user.change.password') ? 'active' : '' }}'>
                        <i class="fa fa-lock"></i>@lang('Change Password')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.twofactor') }}" class='{{ Route::is('user.twofactor') ? 'active' : '' }}'>
                        <i class="fa-solid fa-key"></i>@lang('2FA Security')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}" class="text-danger">
                        <i class="fas fa-sign-out-alt"></i>@lang('Log Out')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
