@extends('layouts.app')

@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection

@section('title', "Welcome to Bangladesh Legal Decisions")

@section('content')

<!-- ===== Banner Section ===== -->
<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content text-center text-white">
                    <h2 class="banner-inner-title">FAQ</h2>
                    <ul class="xs-breadcumb list-inline">
                        <li><a href="{{ url('/') }}">Home</a> / FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FAQ Section ===== -->
<section class="service-inner-sec single-service-sec section-padding py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h3 class="fw-bold text-dark">Frequently Asked Questions</h3>
            <p class="text-muted">Find answers to the most common questions below</p>
            <div class="title-line mx-auto"></div>
        </div>

        <div class="accordion shadow-sm" id="faqAccordion">

            @foreach($faqs as $index => $faq)
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-semibold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection

@section('footer')
@parent
@endsection

@push('styles')
<style>
    .title-line {
        width: 60px;
        height: 3px;
        background: #0d6efd;
        margin-top: 10px;
        border-radius: 3px;
    }

    .accordion-button {
        background-color: #fff;
        color: #222;
        transition: all 0.3s ease;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed) {
        background-color: #0d6efd;
        color: #fff;
    }

    .accordion-item {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
    }

    .accordion-body {
        background-color: #fafafa;
    }
</style>
@endpush