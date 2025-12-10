@extends('layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', "Welcome to Bangladesh Legal Decisions")

@section('content')

<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
  <div class="banner-table">
    <div class="banner-table-cell">
      <div class="container">
        <div class="banner-inner-content">
          <h2 class="banner-inner-title">Our Packages</h2>
          <ul class="xs-breadcumb">
            <li><a href="{{ route('package') }}"> Home / </a> Packages</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="pricing" class="pricing section-padding light-background">

        <div class="container">


            <div class="row gy-4">
                @foreach($packages as $package)
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

@endsection
@section('footer')

@parent
@endsection

@push('scripts')
@endpush