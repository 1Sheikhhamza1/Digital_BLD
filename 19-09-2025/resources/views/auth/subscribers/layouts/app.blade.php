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
            <a class="navbar-brand logo d-flex align-items-center" href="{{ route('subscriber.dashboard') }}">
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
        // Initialize selects inside the modal with dropdownParent option
        $('.select2Data').select2({
            //placeholder: "Select a user",
            allowClear: true,
            dropdownParent: $('#shareModal'),
            width: '100%',
            minimumInputLength: 1,
            minimumResultsForSearch: 0,
            matcher: function(params, data) {
                // If there is no search term, return nothing to prevent showing all
                if ($.trim(params.term) === '') {
                    return null;
                }

                // `data.text` contains the option text like "Mohammad Wasim (email)"
                // We will extract first name and last name to match only starts with typed term

                // Extract just the name part before email if present
                let text = data.text.split('(')[0].trim(); // e.g. "Mohammad Wasim"

                // Split into words (names)
                let words = text.split(/\s+/);

                // Normalize search term and words to lower case for case insensitive
                let term = params.term.toLowerCase();

                // Check if any word starts with search term
                let isMatch = words.some(word => word.toLowerCase().startsWith(term));

                if (isMatch) {
                    return data; // show this result
                }

                // If no match, don't show this option
                return null;
            }
        });




        // Initialize selects outside the modal normally (without dropdownParent)
        $('.select2Data').not('#shareModal .select2Data').select2({
            //placeholder: "Select an year",
            allowClear: true
        });
    </script>
    @stack('scripts')

</body>

</html>