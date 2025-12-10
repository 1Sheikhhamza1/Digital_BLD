<div class="card card-success card-outline mb-4">
    <div class="card-header">
        <h3 class="card-title">Package</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
            </button>
            <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Package Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $package->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Short Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description', $package->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $package->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="duration_type" class="form-label">Duration Type</label>
            <select class="form-select" name="duration_type" id="duration_type" required>
                <option value="monthly" {{ old('duration_type', $package->duration_type ?? '') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="quarterly" {{ old('duration_type', $package->duration_type ?? '') == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                <option value="half_yearly" {{ old('duration_type', $package->duration_type ?? '') == 'half_yearly' ? 'selected' : '' }}>Half Yearly</option>
                <option value="yearly" {{ old('duration_type', $package->duration_type ?? '') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                <option value="lifetime" {{ old('duration_type', $package->duration_type ?? '') == 'lifetime' ? 'selected' : '' }}>Life Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="duration_in_days" class="form-label">Duration in Days</label>
            <input type="number" class="form-control" style="background-color: #eaeaea;" id="duration_in_days" name="duration_in_days" readonly required>
        </div>
        <!-- Hidden duration_in_days -->
        <!-- <input type="text" name="duration_in_days" id="duration_in_days" value="{{ old('duration_in_days', $package->duration_in_days ?? 30) }}"> -->

        <div class="mb-3">
            <label for="currency" class="form-label">Currency</label>
            <input type="text" class="form-control" name="currency" value="{{ old('currency', $package->currency ?? '৳') }}">
        </div>

        <div class="mb-3">
            <label for="highlight_badge" class="form-label">Highlight Badge (e.g., Popular, Best Value)</label>
            <input type="text" class="form-control" name="highlight_badge" value="{{ old('highlight_badge', $package->highlight_badge ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $package->button_text ?? 'Sign up Now') }}">
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" name="order" value="{{ old('order', $package->order ?? 0) }}">
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (optional)</label>
            <input type="file" class="form-control" name="icon">
            @if(isset($package) && $package->icon)
            <img src="{{ asset('uploads/icons/'.$package->icon) }}" alt="Icon" width="50" class="mt-2">
            @endif
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $package->is_featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Mark as Featured</label>
        </div>

        @php
        // Get old input if exists, otherwise decode package features JSON or empty array
        $features = old('features');

        if (!$features && isset($package)) {
        $features = json_decode($package->features, true) ?: [];
        }

        if (!is_array($features)) {
        $features = [];
        }
        @endphp

        <div class="mb-3">
            <label for="features" class="form-label">Features</label>
            <div id="features-wrapper">
                @if(count($features) > 0)
                @foreach($features as $index => $feature)
                <div class="input-group mb-2">
                    <input type="text" name="features[]" class="form-control" value="{{ $feature }}" placeholder="Feature {{ $index + 1 }}">
                    <button type="button" class="btn btn-danger remove-feature">X</button>
                </div>
                @endforeach
                @else
                <div class="input-group mb-2">
                    <input type="text" name="features[]" class="form-control" placeholder="Feature 1">
                    <button type="button" class="btn btn-danger remove-feature">X</button>
                </div>
                @endif
            </div>
            <button type="button" id="add-feature" class="btn btn-success btn-sm mt-2">+ Add Feature</button>
        </div>


        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="1" {{ old('status', $package->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $package->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</div>


@section('page-script')
    <script>
        function updateDurationDays() {
            const type = document.getElementById('duration_type').value;
            let days = 30;
            switch (type) {
                case 'monthly':
                    days = 30;
                    break;
                case 'quarterly':
                    days = 90;
                    break;
                case 'half_yearly':
                    days = 180;
                    break;
                case 'yearly':
                    days = 365;
                    break;
                case 'lifetime':
                    days = 0;
                    break;
            }
            document.getElementById('duration_in_days').value = days;
        }

        document.getElementById('duration_type').addEventListener('change', updateDurationDays);
        updateDurationDays();

        document.getElementById('add-feature').addEventListener('click', function() {
            const wrapper = document.getElementById('features-wrapper');
            const featureCount = wrapper.querySelectorAll('input').length + 1;
            const div = document.createElement('div');
            div.classList.add('input-group', 'mb-2');
            div.innerHTML = `
                <input type="text" name="features[]" class="form-control" placeholder="Feature ${featureCount}">
                <button type="button" class="btn btn-danger remove-feature">X</button>
            `;
            wrapper.appendChild(div);
        });

        document.addEventListener('click', function(e) {
            if(e.target && e.target.classList.contains('remove-feature')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>
    @endsection