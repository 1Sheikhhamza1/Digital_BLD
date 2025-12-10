@extends('layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', "Welcome to Digital Bangladesh Legal Decisions")

@section('content')


<style>
    .force-bullet {
        list-style: disc !important;
        /* show bullets */
        margin-left: 20px !important;
        /* add indentation */
        padding-left: 0 !important;
        /* remove extra padding from global CSS */
        display: block !important;
        /* override flex/inline-block */
    }

    .force-bullet li {
        margin-bottom: 5px;
        /* spacing between items */
    }
</style>

<main class="main">
    <section id="hero" class="hero">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach($homepageData['banners'] as $key => $banner)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('uploads/banners/'.$banner->image) }}" alt="">
                <div class="image-overlay"></div>
                <div class="container d-flex align-items-center">
                    <div class="row w-100">

                        <div class="@auth('subscriber') col-lg-12 @else col-lg-6 @endauth  d-flex flex-column justify-content-center">
                            <div class="slider-text" style="@auth('subscriber') max-width:95% @endauth">
                                <h2>{{ $banner->title }}</h2>
                                <p>{!! $banner->description !!}</p>
                                @if(!empty($banner->button1_text) && !empty($banner->button1_url))
                                <a href="{{ $banner->button1_url }}" class="btn btn-primary me-2" style="background-color: #003092; border-color: #003092;">
                                    {{ $banner->button1_text }}
                                </a>
                                @endif
                                @if(!empty($banner->button2_text) && !empty($banner->button2_url))
                                <a href="{{ $banner->button2_url }}" class="btn btn-outline-light">
                                    {{ $banner->button2_text }}
                                </a>
                                @endif
                            </div>
                        </div>

                        @guest('subscriber')
                        <div class="col-lg-6 d-flex justify-content-end align-items-center">
                            <div class="form-area w-100 d-none d-sm-none d-md-none d-lg-block" style="max-width: 400px; margin-right:30px">
                                @include('auth.subscribers._login', ['transparent' => true])
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section>





    @guest('subscriber')
    <div class="container mt-5 d-block d-sm-block d-md-block d-lg-none">
        <div class="row justify-content-end">

            <div class="col-lg-4 text-end">
                @include('auth.subscribers._login', ['transparent' => false])
            </div>
        </div>
    </div>
    @endguest

    <section id="about" class="about section" style="list-style: disc !important;">
        <div class="container">
            <section id="about" class="about section">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-lg-6">
                            <h2 class="inner-title">{{ $homePageContent->title }}</h2>
                            <p>
                                {!! Str::limit($homePageContent ? $homePageContent->content : '', 800, '...') !!}

                                
                            </p>
                            <div class="read-more-btn">
                                <a href="{{ url('content/' . $homePageContent->slug) }}" class="xs-btn sm-btn">Read More</a>
                            </div>
                        </div>
                        <div class="col-lg-1">&nbsp;</div>
                        <div class="col-lg-5 about-img">
                            <img src="{{ asset('uploads/pages/image/'.$homePageContent->image) }}" alt="About Image">
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <section id="services" class="services section light-background">
        <div class="container">
            <div class="row gy-4">
                <h2 class="inner-title">Legal Decision</h2>
                @foreach($homepageData['legalDecision'] as $decision)
                @php
                // Take judgment text
                $judgment = $decision->judgment ?? '';

                // Match Judge's name at start until ":"
                $judgmentFormatted = preg_replace( '/^([^:]+:)/', // everything before first colon
                '<strong>$1</strong>',
                e(limit_description($judgment, 300)) // limit to safe length
                );
                @endphp

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative p-3 rounded shadow-sm d-flex flex-column h-100">
                        <div class="icon mb-2 text-center">
                            <img src="{{ asset('frontend/assets/img/book.png') }}" alt="Case Icon" class="w-12 h-12">
                        </div>

                        <a href="{{ route('subscriber.login') }}"
                            class="stretched-link text-decoration-none text-dark d-flex flex-column flex-grow-1">

                            <!-- Parties (max 3 lines, bold) -->
                            <div class="clamp-3 mb-2 fw-bold">
                                {!! $decision->parties !!}
                            </div>

                            <!-- Case No (max 1 line, lighter text) -->
                            <div class="text-sm text-gray-500 clamp-1 text-center mb-2">
                                {!! $decision->case_no !!}
                            </div>

                            <!-- Judgment (max 4 lines, fills remaining space) -->
                            <p class="text-sm text-gray-700 clamp-4 flex-grow-1 mb-0">
                                {!! $judgmentFormatted !!}
                            </p>
                        </a>
                    </div>

                </div>

                @endforeach
            </div>
        </div>
    </section>


    <section id="about" class="how-it-works section about section">
        <div class="container">
            <div class="row position-relative">
                @php
                $firstChoose = $homepageData['whyChooses']->first();
                $otherChooses = $homepageData['whyChooses']->skip(1);
                @endphp

                <div class="col-lg-7">
                    <h2 class="inner-title"><a href="{{ getPageUrl($firstChoose) }}">{{ $firstChoose->title ?? '' }}</a></h2>
                    <p>{!! limit_description($firstChoose->content ? $firstChoose->content : '', 200) ?? '' !!}</p>

                    <div class="col-lg-12 about-img">
                        @if($firstChoose->image)
                        <img src="{{ asset('uploads/pages/image/'.$firstChoose->image) }}" style="max-height: 300px;">
                        @else
                        <img src="{{ asset('frontend/assets/img/about.jpg') }}" style="max-height: 300px;">
                        @endif
                    </div>
                </div>

                <div class="col-lg-5 about-img">
                    <div class="row">
                        @foreach($otherChooses as $choose)
                        <div class="col-sm-6 col-12">
                            <div class="works-item card-radius {{ $loop->first ? 'active' : '' }}">
                                <a href="{{ getPageUrl($choose) }}">
                                    @if(!empty($choose->icon))
                                    <img src="{{ asset('uploads/pages/icon/'.$choose->icon) }}">
                                    @else
                                    <div class="number-circle large {{ $loop->first ? 'disable' : '' }}"><i class="fa fa-balance-scale"></i></div>
                                    @endif
                                    <h3 style="min-height: 50px;">{{ $choose->title ?? '' }}</h3>
                                    <p>{{ limit_description(html_entity_decode($choose->content ? $choose->content : '', ENT_QUOTES | ENT_HTML5), 80) }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="services" class="how-it-works section light-background">
        <div class="container">
            <h2 class="inner-title">How Digital BLD Works?</h2>
            <h6>A Smarter Way to Access Legal Information</h6>
            <p>Digital BLD is designed to simplify and enhance the legal research experience for every legal professional. Here's how it works:</p>
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">1</div>
                        <a href="#">
                            <h3>Search Smarter</h3>
                        </a>
                        <strong>Find what matters—fast.</strong><br />
                        Advanced search engine with filters for:
                        <ul class="force-bullet">
                            <li>Court, citation, party name, or legal issue</li>
                            <li>Accurate, relevant results every time</li>
                            <li>Lightning-fast response powered by intelligent indexing</li>
                        </ul>
                        <i>🖱️ Just type, filter, and find.</i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">2</div>
                        <a href="#">
                            <h3>Browse Official Case Law</h3>
                        </a>
                        <strong>Authoritative, up-to-date decisions.</strong><br />
                        Access verified Supreme Court judgments, clean formats, clearly tagged legal issues:
                        <ul class="force-bullet">
                            <li>Supreme Court judgments</li>
                            <li>Clean, readable formats</li>
                            <li>Tagged legal issues, citations & parties</li>
                        </ul>
                        <i>📘 All in one trusted platform.</i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">3</div>
                        <a href="#">
                            <h3>Understand with Editorial Insights</h3>
                        </a>
                        Go beyond the judgment with expert headnotes and summaries:
                        <ul class="force-bullet">
                            <li>Expert-written headnotes</li>
                            <li>Case summaries & legal principles</li>
                            <li>Related case history and precedents</li>
                        </ul>
                        <i>🔍 Clarity, context, and credibility built-in.</i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">4</div>
                        <a href="#">
                            <h3>Save, Organize & Share</h3>
                        </a>
                        Research that stays with you:
                        <ul class="force-bullet">
                            <li>Save important cases for quick access</li>
                            <li>Create topic-wise folders</li>
                            <li>Share cases securely with peers or students</li>
                        </ul>
                        <i>📂 Your personalized digital legal library.</i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="testimonials" class="testimonials section">

        <section id="testimonials" class="section">
            <div class="container">
                <h2 class="inner-title">Testimonials</h2>
                <div class="row gy-4">
                    @foreach($homepageData['feedbacks'] as $feedback)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="testimonial-item">
                            <img src="{{ asset('uploads/feedback/image/'.$feedback->client_photo) }}" class="testimonial-img" alt="{{ $feedback->name ?? 'Client' }}">
                            <h3>{{ $feedback->client_name ?? '' }}</h3>
                            <h4>{{ $feedback->client_position ?? '' }}</h4>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$feedback->rating)
                                    <i class="bi bi-star-fill"></i>
                                    @else
                                    <i class="bi bi-star"></i>
                                    @endif
                                    @endfor
                            </div>

                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{ limit_description($feedback->feedback ? strip_tags($feedback->feedback) : '', 150) }}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


    </section>


    <!-- <section id="portfolio" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Photo Gallery</h2>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($homepageData['photos'] ?? [] as $photo)
                    @php
                    $categorySlug = isset($photo->category) ? Str::slug($photo->category->name) : 'uncategorized';
                    @endphp
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $categorySlug }}">
                        <img src="{{ asset('uploads/photos/' . $photo->image) }}" class="img-fluid" alt="{{ $photo->title.' BLD photo gallery' }}">
                        <div class="portfolio-info">
                            <h4>{{ $photo->title }}</h4>
                            <p>{{ format_date($photo->created_at) ?? '' }}</p>
                            <a href="{{ asset('uploads/photos/' . $photo->image) }}" title="{{ $photo->title }}"
                                data-gallery="portfolio-gallery-{{ $categorySlug }}" class="glightbox preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section> -->

    <section id="pricing" class="pricing section-padding light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Packages</h2>
        </div>

        <div class="container">
            <div class="row gy-4">
                @foreach($homepageData['packages'] as $package)
                @php
                $colClass = 'col-lg-4';
                $pricingItemClass = 'pricing-item';
                $popularBadge = '';

                if ($package->is_featured) {
                $colClass .= ' active';
                $pricingItemClass .= ' featured';
                $popularBadge = '<p class="popular">' . ($package->highlight_badge ?? 'Popular') . '</p>';
                }

                $currency = $package->currency ?? '৳';
                $buttonText = $package->button_text ?? 'Sign up Now';
                $durationTextMap = [
                'monthly' => '/ month',
                'quarterly' => '/ quarter',
                'half_yearly' => '/ half year',
                'yearly' => '/ year',
                'lifetime' => '/ lifetime',
                ];
                $durationText = $durationTextMap[$package->duration_type] ?? '/ month';

                // Load features for this package
                $features = $package->features ?? collect();
                @endphp

                <div class="{{ $colClass }}" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    <div class="{{ $pricingItemClass }}">
                        {!! $popularBadge !!}
                        <h3>{{ $package->name }}</h3>
                        <p class="description">{{ $package->description }}</p>
                        <h4>
                            <sup>{{ $currency }}</sup>{{ number_format($package->price, 0) }}
                            <span>{{ $durationText }}</span>
                        </h4>
                        <div class="pricing-content">
                            <ul>
                                @foreach($features as $feature)
                                @php
                                // Check if feature is active
                                $isAvailable = $feature->status;
                                @endphp
                                <li class="{{ $isAvailable ? '' : 'na' }}">
                                    @if($isAvailable)
                                    <span class="number-circle small"><i class="bi bi-check"></i></span>
                                    @else
                                    <i class="bi bi-x"></i>
                                    @endif
                                    <span>{{ $feature->name }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('subscriber.subscription.form', $package->id) }}" class="cta-btn">
                                {{ $buttonText }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="clients" class="clients section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Useful Links</h2>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0 clients-wrap">

                @foreach($homepageData['usefulllinks'] as $link)
                <div class="col-xl-2 col-md-3 client-logo">
                    <a href="{{ $link->website }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('uploads/link/' . $link->logo) }}" class="img-fluid" alt="{{ $link->name ?? 'Useful Link' }}">
                    </a>
                </div>
                @endforeach

            </div>

        </div>

    </section>

    <section class="service-inner-sec single-service-sec section-padding py-5 bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="fw-bold text-dark">Frequently Asked Questions</h3>
                <p class="text-muted">Find answers to the most common questions below</p>
                <div class="title-line mx-auto"></div>
            </div>
            @include('frontend._faq')
        </div>
    </section>




</main>
@endsection
@section('footer')

@parent
@endsection

@push('scripts')
@endpush