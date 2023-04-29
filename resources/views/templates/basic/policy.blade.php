@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card custom--card">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __($pageTitle) }}</h4>
                    </div>
                    <div class="card-body wyg px-3">
                        @php
                            echo $policy->data_values->details
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<style>
    strong{
        color: #3a3a3a;
        font-weight: 500;
    }
</style>
@endpush
