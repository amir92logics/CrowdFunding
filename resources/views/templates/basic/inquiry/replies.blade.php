@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-8 col-lg-8 col-md-12">
    <h4 class="title mb-25">@lang('Inquiry Replies')</h4>
    <div class="dashboard_box">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <p class="fw-bold">{{__($inquiries->inquiry)}}</p>
                    <span class="fw-light">{{__(showDateTime($inquiries->created_at))}}</span>
                </div>

                <form action="{{route('user.inquiry.store.replies', $inquiries->id)}}" method="POST">
                    @csrf
                    <div class="modal_body_wrapper">
                        <div class="form-group profile mb-15">
                            <label for="first_name">@lang('Enter Your Message')</label>
                            <div class="single-input">
                                <textarea name="message" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="register_bottom mb-30">
                            <button class="theme_btn style_1 mb-4" type="submit"><span
                                    class="btn_title">@lang('Reply')<i
                                        class="fa-solid fa-angles-right"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="title mb-4">@lang('Replies')</h4>

                @forelse($replies as $item)
                <div class="card mb-2 p-4 reply">
                    <p class="fw-bold">{{__($item->message)}}</p>
                    <span class="fw-light">{{ '@'.@$item->user->username }},
                        {{__(showDateTime($item->created_at))}}</span>
                </div>

                @empty
                <p>{{__($emptyMessage)}}</p>
                @endforelse


            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="pagination-wrapper mt-30 mb-30 md-mt-10">
                    @if ($replies->hasPages())
                    <div class="py-4">
                        {{ paginateLinks($replies) }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection