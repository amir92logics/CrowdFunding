@extends($activeTemplate .'layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 mt-5">
            <div class="text-end">
            </div>
            <div class="card custom--card">
                <div class="card-body">
                    <h3 class="text-center text-danger">@lang('You are banned')</h3>
                    <p class="fw-bold mb-1">@lang('Reason'):</p>
                    <p>{{ $user->ban_reason }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
