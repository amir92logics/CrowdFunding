@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               
                <div class="card custom--card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __($pageTitle) }}</h4>
                    </div>
                    <div class="card-body wyg px-3">
                        @php
                            echo $cookie->data_values->description
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
