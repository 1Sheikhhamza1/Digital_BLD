@extends('auth.subscribers.layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', Auth::guard('subscriber')->user()->name.' | BLD Profile')

@section('content')

<div class="container mt-5">
    <div class="row g-4">
        <main class="col-lg-9 offset-2">
            <h3 class="mb-4">Bookmarks</h3>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="search-results-list">
                @forelse ($bookmarkedDecisions as $index => $item)
                <div class="search-result-item d-flex text-decoration-none text-reset">
                    <a href="{{ route('subscriber.singleDecision', [$item->id, Crypt::encrypt('bookmark')]) }}">
                        <h5 class="card-title text-truncate-3 text-dark">
                            {!! $item->parties !!}
                        </h5>

                        <div class="text-sm text-dark line-clamp-2" style="text-align:center;padding-bottom:5px">
                            {!! $item->case_no !!}
                        </div>
                        
                        <p class="result-meta">
                            {!! Str::limit(strip_tags($item->judgment) ?? 'No description available.', 150) !!}
                        </p>
                    </a>
                    <!-- <i class="bi bi-bookmark-fill text-secondary"></i> -->

                    <form action="{{ route('subscriber.bookmark.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to remove this bookmark?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none; padding: 0;">
                            <i class="bi bi-trash text-danger"></i>
                        </button>
                    </form>


                </div>
                @empty
                <p>No results found.</p>
                @endforelse
            </div>
        </main>
    </div>
</div>


@endsection