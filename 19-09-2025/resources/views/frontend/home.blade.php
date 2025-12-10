@extends('layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', "Welcome to Bangladesh Legal Decisions")

@section('content')
<main class="main">
    <section id="hero" class="hero">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach($homepageData['banners'] as $key => $banner)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('uploads/banners/'.$banner->image) }}" alt="">
                <div class="image-overlay"></div>
                <div class="container d-flex align-items-center">
                    <div class="row w-100">
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <div class="slider-text">
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

    <section id="about" class="about section">
        <div class="container">
            <section id="about" class="about section">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-lg-6">
                            <h2 class="inner-title">Who is this for</h2>
                            <p>
                                {!! $homePageContent ? $homePageContent->content : '' !!}
                            </p>
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
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/book.png') }}">
                        </div>
                        <a href="{{ route('subscriber.login') }}" class="stretched-link">
                            <h3>{!! $decision->parties !!}</h3>
                        </a>

                        

                        <p>{{ limit_description($decision->judgment ? $decision->judgment : '', 150) }}</p>
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
                                <p>{{ limit_description($choose->content ? strip_tags($choose->content) : '', 80) }}</p>
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
            <h2 class="inner-title">How It Works</h2>
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">1</div>
                        <a href="#">
                            <h3>Submit Your Case</h3>
                        </a>
                        <p>Provide us with all the necessary case details and supporting documents to get started quickly and securely.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">2</div>
                        <a href="#">
                            <h3>Case Review</h3>
                        </a>
                        <p>Our legal experts carefully analyze your case, ensuring accuracy and providing preliminary recommendations.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">3</div>
                        <a href="#">
                            <h3>Receive Guidance</h3>
                        </a>
                        <p>We offer detailed legal advice and strategic options tailored to your specific situation and goals.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="works-item">
                        <div class="number-circle large">4</div>
                        <a href="#">
                            <h3>Proceed with Confidence</h3>
                        </a>
                        <p>Take the next steps confidently with our ongoing support, ensuring smooth legal processes and better outcomes.</p>
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


    <section id="portfolio" class="portfolio section">
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
    </section>

    <section id="pricing" class="pricing section-padding light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Pacakges</h2>
        </div>
        <div class="container">


            <div class="row gy-4">
                @foreach($homepageData['packages'] as $package)
                @php
                // Decode features JSON into array
                $features = json_decode($package->features, true) ?: [];

                // Determine classes and badge
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
                ];
                $durationText = $durationTextMap[$package->duration_type] ?? '/ month';
                @endphp

                <div class="{{ $colClass }}" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    <div class="{{ $pricingItemClass }}">
                        {!! $popularBadge !!}
                        <h3>{{ $package->name }}</h3>
                        <p class="description">{{ $package->description }}</p>
                        <h4><sup>{{ $currency }}</sup>{{ number_format($package->price, 0) }}<span> {{ $durationText }}</span></h4>
                        <div class="pricing-content">
                            <ul>
                                @foreach($features as $feature)
                                @php
                                // If feature string starts with "na:" consider it as not available feature, else available
                                $isAvailable = true;
                                $featureText = $feature;
                                if (stripos($feature, 'na:') === 0) {
                                $isAvailable = false;
                                $featureText = substr($feature, 3); // remove 'na:' prefix
                                }
                                @endphp
                                <li class="{{ $isAvailable ? '' : 'na' }}">
                                    @if($isAvailable)
                                    <span class="number-circle small"><i class="bi bi-check"></i></span>
                                    @else
                                    <i class="bi bi-x"></i>
                                    @endif
                                    <span>{{ $featureText }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('subscriber.subscription.form', $package->id) }}" class="cta-btn">{{ $buttonText }}</a>
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
                <div class="col-xl-3 col-md-4 client-logo">
                    <a href="{{ $link->website }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('uploads/link/' . $link->logo) }}" class="img-fluid" alt="{{ $link->name ?? 'Useful Link' }}">
                    </a>
                </div>
                @endforeach

            </div>

        </div>

    </section>


</main>
@endsection
@section('footer')

@parent
@endsection

@push('scripts')
@endpush