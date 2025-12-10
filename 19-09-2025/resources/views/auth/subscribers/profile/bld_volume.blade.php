@extends('auth.subscribers.layouts.app')
@section('seodetails')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@endsection
@section('title', Auth::guard('subscriber')->user()->name.' | BLD Profile')

@section('content')
<div class="container py-4">
    <!-- Search Bar -->
    <div class="search-bar-container">
        <div class="input-group search-input-group position-relative">
            <i class="bi bi-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>

            <select name="volume_number" class="form-select" style="padding-left: 40px !important;" onchange="searchVolume(this.value)">
                <option value="">Search by volume number</option>
                @foreach($volumeList as $id => $volumeName)
                <option value="{{ $id }}"> {{ $volumeName }} </option>
                @endforeach
            </select>

            <button type="button" class="btn" onclick="clearVolumeSearch()" style="margin-left: 10px;">
                Clear
            </button>
        </div>
    </div>

    <!-- Volume Grid -->
    <div class="volume-grid-container">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xl-8 g-4">
            <!-- Book Item (Repeat 16 times as in the image) -->
            @foreach($volume_list as $volume)
            <div class="col">
                <div class="book-item">
                    <a class="book-icon-wrapper" href="{{ route('subscriber.legalDecision', $volume->id) }}">
                        <img
                            src="{{ $volume->image && file_exists(public_path('uploads/volume/'.$volume->image)) 
                        ? asset('uploads/volume/'.$volume->image) 
                        : asset('frontend/assets/img/book.png') }}"
                            alt="Volume Book">
                        <span class="book-number">{{ $volume->number }}</span>
                    </a>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
    const searchVolume = (selectedVolume) => {
        const url = "{{ route('subscriber.bldVolume') }}?volume=" + encodeURIComponent(selectedVolume);
        window.location.href = url;
    }
    const clearVolumeSearch = () => {
        const select = document.querySelector('select[name="volume_number"]');
        select.value = '';
        const baseUrl = "{{ route('subscriber.bldVolume') }}";
        window.location.href = baseUrl; // reload without query
    }
</script>
@endpush