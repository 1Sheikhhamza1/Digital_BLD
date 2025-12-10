@extends('auth.subscribers.layouts.app')
@section('content')

<div class="container py-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <h3 class="mb-4">Shared Legal Decision</h3>

    <!-- Files Grid -->
    <form action="{{ route('subscriber.files.downloadMultiple') }}" method="POST">
        @csrf

        <div class="row g-3">
            @forelse($sharedDecisions as $share)
            <div class="col-6 col-md-4 col-lg-3">
                <a class="card-item" href="{{ route('subscriber.sharedDecision', Crypt::encrypt($share->id)) }}">
                    <h5 class="card-title">
                        {{ $share ? ($share->decision ? $share->decision->parties : '') : '' }}
                        ({{ $share ? ($share->decision ? $share->decision->decided_on : '') : '' }} - {{ $share ? ($share->decision ? $share->decision->division : '') : '' }})
                    </h5>
                    <p class="card-text">
                        {!! Str::limit(strip_tags($share ? ($share->decision ? $share->decision->judgment : '') : ''), 250) !!}
                    </p>
                </a>
            </div>
            @empty
            <p>No decision yet.</p>
            @endforelse
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function removeFromFolder(decisionId, folderId) {
        fetch("{{ route('subscriber.remove-decision-from-folder') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    decision_id: decisionId,
                    folder_id: folderId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // alert(data.message);
                    window.location.reload()
                } else {
                    alert(data.message || 'Something went wrong.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to remove decision from folder.');
            });
    }
</script>

@endpush