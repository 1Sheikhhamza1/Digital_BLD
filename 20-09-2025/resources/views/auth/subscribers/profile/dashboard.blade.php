@extends('auth.subscribers.layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', Auth::guard('subscriber')->user()->name.' | BLD Profile')

@section('content')


<div class="container py-4">
    <div class="row justify-content-center">

        @if ($hasAnySubscription && !$hasAnySubscription->activeSubscription)
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>ℹ️ Attention:</strong> You need to subscribe to access features.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="col-sm-12 bg-white p-3 mb-4">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Subscribe</h4>
                    <p>to any BLD package to enjoy our services</p>
                </div>
                <div class="col-sm-6 align-items-center justify-content-end d-flex">
                    <a href="{{ route('package') }}" class="book-now-btn">Subscribe Now</a>
                </div>
            </div>
        </div>
        @endif



        <!-- Main Content Area -->
        <main class="col-lg-9 pe-4">
            <!-- BLD Services Section -->
            <section class="mb-5">
                <h5 class="mb-4">BLD Services</h5>
                <div class="d-flex flex-wrap gap-2 justify-content-start service-card-group">
                    <div class="service-card active">
                        <a href="{{ route('subscriber.leagalSearch') }}">
                            <i class="bi bi-search"></i>
                            <span>Legal Search</span>
                        </a>
                    </div>

                    <div class="service-card">
                        <a href="{{ route('subscriber.bldVolume') }}">
                            <i class="bi bi-book"></i>
                            <span>BLD Volume</span>
                        </a>
                    </div>

                    <div class="service-card">
                        <a href="{{ route('subscriber.myFolder') }}">
                            <i class="bi bi-folder"></i>
                            <span>My Folder</span>
                        </a>
                    </div>

                    <div class="service-card">
                        <a href="#" onclick="alert('Comming Soon')">
                            <i class="bi bi-lightbulb"></i>
                            <span>Legal Terminology</span>
                        </a>
                    </div>

                    <div class="service-card">
                        <a href="{{ route('subscriber.bookmark') }}">
                            <i class="bi bi-bookmark"></i>
                            <span>Bookmark</span>
                        </a>
                    </div>

                    <div class="service-card">
                        <a href="{{ route('subscriber.profile') }}">
                            <i class="bi bi-person-gear"></i>
                            <span>My Account</span>
                        </a>
                    </div>

                </div>
            </section>

            <div class="row g-4">
                <!-- Bookmark Section -->
                <section class="col-md-6">
                    <div style="width: 100%; min-height:280px; height:auto;" class=" p-3 rounded h-100 d-flex flex-column bg-white">
                        <div class="section-header d-flex justify-content-between align-items-center">
                            <h5>Bookmark</h5>
                            <a href="{{ route('subscriber.bookmark') }}" class="see-more">See all <i class="bi bi-chevron-right ms-1"></i></a>
                        </div>

                        <div class="flex-grow-1 overflow-auto">
                            @forelse($bookmarkedDecisions as $bookmark)
                            <a class="content-card d-flex align-items-center" href="{{ route('subscriber.singleDecision', [$bookmark->id, Crypt::encrypt('dashboard')]) }}">
                                <i class="bi bi-bookmark-fill see-more me-3 fs-4"></i>
                                <div class="card-body border-bottom p-0 pb-2 pt-2">
                                    <p class="card-text text-muted mb-1 small">{!! $bookmark->parties !!}</p>
                                    <h6 class="card-title fw-bold mb-2">{{ $bookmark->decided_on ?? 'N/A' }} - {{ $bookmark->division ?? 'N/A' }}</h6>
                                    <p class="card-text text-muted small">
                                        {!! Str::limit(strip_tags($bookmark->judgment) ?? 'No description available.', 250) !!}
                                    </p>
                                </div>
                            </a>
                            @empty
                            <div class="d-flex flex-column justify-content-center align-items-center text-muted h-100">
                                <i class="bi bi-file-earmark-x" style="font-size: 3rem; color: #6c757d;"></i>
                                <p>No bookmarks found</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                </section>


                <!-- My Folder Section -->
                <section class="col-md-6">
                    <div style="width: 100%; min-height: 280px;" class="p-3 rounded h-100 d-flex flex-column bg-white">
                        <div class="section-header d-flex justify-content-between align-items-center">
                            <h5>My Folder</h5>
                            <a href="{{ route('subscriber.myFolder') }}" class="see-more">See all <i class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                        <div class="row overflow-auto">
                            @forelse($folders as $folder)
                            <div class="col-sm-3 p-0">
                                <a href="{{ route('subscriber.files.index', Crypt::encrypt($folder->id)) }}" class="content-card folder-item">
                                    <img src="{{ asset('frontend/assets/img/folder.png') }}" class="w-50">
                                    <span>{{$folder->name}}</span>
                                </a>
                            </div>
                            @empty
                            <div class="d-flex flex-column justify-content-center align-items-center text-muted h-100">
                                <i class="bi bi-file-earmark-x" style="font-size: 3rem; color: #6c757d;"></i>
                                <p>No Folders found</p>
                            </div>
                            @endforelse
                        </div>
                    </div>



                </section>
            </div>
        </main>

        <aside class="col-lg-3 sidebar p-0">
            <div class="section-header">
                <h5>My Reminder</h5>
                <a href="{{ route('subscriber.events.index') }}" class="see-more">
                    See all <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>

            @include('auth.subscribers.layouts.calender')
        </aside>
    </div>
</div>

@endsection