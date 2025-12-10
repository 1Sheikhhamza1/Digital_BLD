@extends('auth.subscribers.layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', Auth::guard('subscriber')->user()->name.' | BLD Profile')

@section('content')

<div class="container mt-5">
    <div class="row g-4">
        <main class="col-lg-9">
            <div class="search-summary">
                <div class="row d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-sm-10">
                        <span class="fw-semibold me-2">Search result for:</span>
                        @forelse($searchInputParams as $key => $value)
                        <span class="badge bg-primary text-white text-capitalize">
                            {{ str_replace('_', ' ', $key) }}: {{ $value }}
                        </span>
                        @empty
                        <span class="text-muted">All</span>
                        @endforelse
                    </div>
                    <div class="col-sm-2">
                        <strong>{{ $results->total() }}</strong> results found
                    </div>
                </div>
                <!-- <div class="dropdown dropdown-sort">
                    <button class="btn dropdown-toggle" type="button" id="dropdownSortBy" data-bs-toggle="dropdown" aria-expanded="false">
                        By date
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownSortBy">
                        <li><a class="dropdown-item" href="#">By relevance</a></li>
                        <li><a class="dropdown-item" href="#">By name</a></li>
                    </ul>
                </div> -->
            </div>

            <div class="search-results-list">
                @forelse ($results as $index => $item)
                <a href="{{ route('subscriber.singleDecision', [$item->id, Crypt::encrypt('showResults')]) }}" class="search-result-item d-flex text-decoration-none text-reset">
                    <div class="result-number">{{ $results->firstItem() + $index }}.</div>
                    <div>
                        <h6 class="result-title">
                            {{ $item->parties ?? 'Untitled Case' }}
                            ({{ $item->decided_on ?? 'N/A' }})
                        </h6>
                        <p class="result-meta">
                            {{-- Assuming $item has a 'summary' or 'judgment' snippet --}}
                            {{ Str::limit($item->judgment ?? $item->summary ?? 'No summary available', 150) }}
                        </p>
                    </div>
                </a>
                @empty
                <p>No results found.</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $results->links('pagination::bootstrap-5') }}
            </div>
        </main>

        <aside class="col-lg-3 d-none d-lg-block"> <!-- Hidden on small/medium screens -->
            <div class="sidebar">
                <h5>Quick Links</h5>

                <a href="{{ route('subscriber.leagalSearch') }}" class="quick-link-item">
                    <i class="bi bi-pencil-square"></i>
                    <span>Modify Search</span>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="{{ route('subscriber.leagalSearch', ['new' => 1]) }}" class="quick-link-item">
                    <i class="bi bi-search"></i>
                    <span>Search New</span>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>
            </div>
        </aside>

    </div>
</div>


@endsection