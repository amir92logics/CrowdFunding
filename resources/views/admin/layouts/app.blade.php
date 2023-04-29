@extends('admin.layouts.master')

@section('content')
<!-- page-wrapper start -->
<div class="page-wrapper default-version">
    @include('admin.partials.sidenav')
    @include('admin.partials.topnav')
    <div class="breadcrumb-wrapper">
        @include('admin.partials.breadcrumb')
    </div>

    <div class="body-wrapper">
        <div class="bodywrapper__inner">


            @yield('panel')


        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->
</div>



@endsection