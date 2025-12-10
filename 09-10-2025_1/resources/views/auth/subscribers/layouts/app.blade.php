<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom/calender.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{asset('assets/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" sizes="192x192">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/favicon.png') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand logo d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('frontend/assets/img/logo.png') }}">
                <span class="sitename">Bangladesh Legal Decisions</span>
            </a>

            @php
            $today = now()->format('d F, Y');
            $isDashboard = Route::currentRouteName() === 'subscriber.dashboard';
            @endphp

            <div class="d-flex align-items-center ms-auto">
                @if($isDashboard)
                <span class="navbar-text me-3 d-none d-md-inline">
                    @if (!empty($hasAnySubscription?->activeSubscription?->package?->name))
                    Package <br />
                    <span class="fw-bold">{{ $hasAnySubscription->activeSubscription->package->name }}</span> |
                    @endif
                    {{ $today }}
                </span>

                <!-- <i class="bi bi-bell mx-2"></i> -->
                @else
                @include('auth.subscribers.layouts._nav')
                @endif

                @auth('subscriber')
                @include('auth.subscribers.layouts._profile')
                @endauth
            </div>

        </div>

    </nav>
    @yield('content')


    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('.select2Data').select2({
            placeholder: "Select a user",
            // no allowClear → no cross button
            dropdownParent: $('#shareModal'),
            width: '100%',
            minimumInputLength: 1,
            minimumResultsForSearch: 0,
            matcher: function(params, data) {
                if ($.trim(params.term) === '') {
                    return null; // don’t show anything until user types
                }

                let text = data.text.split('(')[0].trim();
                let words = text.split(/\s+/);
                let term = params.term.toLowerCase();

                let isMatch = words.some(word => word.toLowerCase().startsWith(term));

                return isMatch ? data : null;
            }
        });


        $('.select2Data').not('#shareModal .select2Data').select2({
            // allowClear: true
        });
    </script>
    @stack('scripts')

</body>

</html>