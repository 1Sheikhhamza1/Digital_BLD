<section class="service-inner-sec single-service-sec section-padding py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h3 class="fw-bold text-dark">Frequently Asked Questions</h3>
            <p class="text-muted">Find answers to the most common questions below</p>
            <div class="title-line mx-auto"></div>
        </div>

        <div class="accordion shadow-sm" id="faqAccordion">

            @foreach($homepageData['faqs'] as $index => $faq)
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