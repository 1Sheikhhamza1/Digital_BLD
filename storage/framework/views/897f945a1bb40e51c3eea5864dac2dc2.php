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
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $package->name ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Short Description</label>
            <textarea class="form-control" name="description" rows="3"><?php echo e(old('description', $package->description ?? '')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" value="<?php echo e(old('price', $package->price ?? '')); ?>" required>
        </div>

        <div class="mb-3 row">
            <label for="discount" class="col-sm-2 col-form-label">Discount</label>

            <div class="col-sm-3">
                <input type="number" step="0.01"
                    class="form-control"
                    name="discount"
                    value="<?php echo e(old('discount', $package->discount ?? '')); ?>"
                    required>
            </div>

            <div class="col-sm-2">
                <select class="form-select" name="discount_type" id="discount_type" required>
                    <option value="%" <?php echo e(old('discount_type', $package->discount_type ?? '') == '%' ? 'selected' : ''); ?>>%</option>
                    <option value="Tk" <?php echo e(old('discount_type', $package->discount_type ?? '') == 'Tk' ? 'selected' : ''); ?>>Tk</option>
                </select>
            </div>
        </div>


        <div class="mb-3">
            <label for="duration_type" class="form-label">Duration Type</label>
            <select class="form-select" name="duration_type" id="duration_type" required>
                <option value="monthly" <?php echo e(old('duration_type', $package->duration_type ?? '') == 'monthly' ? 'selected' : ''); ?>>Monthly</option>
                <option value="quarterly" <?php echo e(old('duration_type', $package->duration_type ?? '') == 'quarterly' ? 'selected' : ''); ?>>Quarterly</option>
                <option value="half_yearly" <?php echo e(old('duration_type', $package->duration_type ?? '') == 'half_yearly' ? 'selected' : ''); ?>>Half Yearly</option>
                <option value="yearly" <?php echo e(old('duration_type', $package->duration_type ?? '') == 'yearly' ? 'selected' : ''); ?>>Yearly</option>
                <option value="lifetime" <?php echo e(old('duration_type', $package->duration_type ?? '') == 'lifetime' ? 'selected' : ''); ?>>Life Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="duration_in_days" class="form-label">Duration in Days</label>
            <input type="number" class="form-control" style="background-color: #eaeaea;" id="duration_in_days" name="duration_in_days" readonly required>
        </div>

        <div class="mb-3">
            <label for="currency" class="form-label">Currency</label>
            <input type="text" class="form-control" name="currency" value="<?php echo e(old('currency', $package->currency ?? '৳')); ?>">
        </div>

        <div class="mb-3">
            <label for="highlight_badge" class="form-label">Highlight Badge (e.g., Popular, Best Value)</label>
            <input type="text" class="form-control" name="highlight_badge" value="<?php echo e(old('highlight_badge', $package->highlight_badge ?? '')); ?>">
        </div>

        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" value="<?php echo e(old('button_text', $package->button_text ?? 'Sign up Now')); ?>">
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" name="order" value="<?php echo e(old('order', $package->order ?? 0)); ?>">
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (optional)</label>
            <input type="file" class="form-control" name="icon">
            <?php if(isset($package) && $package->icon): ?>
            <img src="<?php echo e(asset('uploads/icons/'.$package->icon)); ?>" alt="Icon" width="50" class="mt-2">
            <?php endif; ?>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" value="1" <?php echo e(old('is_featured', $package->is_featured ?? false) ? 'checked' : ''); ?>>
            <label class="form-check-label" for="is_featured">Mark as Featured</label>
        </div>

        <?php
        $package = $package ?? null;

        // For old input or existing package
        $selectedFeatures = old('features', $package ? $package->features->pluck('id')->toArray() : []);
        $selectedModules = old('modules', $package ? $package->modules->pluck('id')->toArray() : []);
        ?>

        <div class="mb-3">
            <label for="features" class="form-label">Select Features & Modules</label>

            <!-- Global Select All -->
            <div class="mb-2">
                <input type="checkbox" id="select_all_features_modules">
                <label for="select_all_features_modules" class="fw-semibold">Select All Features & Modules</label>
            </div>

            <div class="row">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $featureModuleSelected = [];
                if ($package) {
                $featureModuleSelected = $package->modules
                ->where('feature_id', $feature->id)
                ->pluck('id')
                ->toArray();
                }
                if (old('modules.'.$feature->id)) {
                $featureModuleSelected = old('modules.'.$feature->id);
                }
                ?>

                <div class="col-md-4 mb-2">
                    <div class="border p-2 rounded">
                        <!-- Feature Checkbox -->
                        <div class="form-check">
                            <input type="checkbox"
                                class="form-check-input feature-checkbox"
                                name="features[]"
                                value="<?php echo e($feature->id); ?>"
                                id="feature_<?php echo e($feature->id); ?>"
                                <?php echo e(in_array($feature->id, $selectedFeatures) ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-semibold" for="feature_<?php echo e($feature->id); ?>"><?php echo e($feature->name); ?></label>
                        </div>

                        <!-- Modules for this feature -->
                        <div class="ms-3 mt-2 <?php echo e(in_array($feature->id, $selectedFeatures) ? '' : 'd-none'); ?>" id="modules_feature_<?php echo e($feature->id); ?>">
                            <small>
                                <input type="checkbox" class="select-all-modules" data-feature="<?php echo e($feature->id); ?>"
                                    <?php echo e(count($featureModuleSelected) === $feature->modules->count() ? 'checked' : ''); ?>>
                                Select All Modules
                            </small>

                            <?php $__currentLoopData = $feature->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input module-checkbox feature_<?php echo e($feature->id); ?>"
                                    name="modules[<?php echo e($feature->id); ?>][]"
                                    value="<?php echo e($module->id); ?>"
                                    <?php echo e(in_array($module->id, $featureModuleSelected) ? 'checked' : ''); ?>>
                                <label class="form-check-label"><?php echo e($module->name); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>




        <?php
        // Get old input if exists, otherwise decode package features_mask JSON or empty array
        $features_mask = old('features_mask');

        if (!$features_mask && isset($package)) {
        $features_mask = json_decode($package->features_mask, true) ?: [];
        }

        if (!is_array($features_mask)) {
        $features_mask = [];
        }
        ?>

        <div class="mb-3">
            <label for="features" class="form-label">Features Mask</label>
            <div id="features-wrapper">
                <?php if(count($features_mask) > 0): ?>
                <?php $__currentLoopData = $features_mask; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $featureMask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group mb-2">
                    <input type="text" name="features_mask[]" class="form-control" value="<?php echo e($featureMask); ?>" placeholder="Feature <?php echo e($index + 1); ?>">
                    <button type="button" class="btn btn-danger remove-feature">X</button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="input-group mb-2">
                    <input type="text" name="features_mask[]" class="form-control" placeholder="Feature 1">
                    <button type="button" class="btn btn-danger remove-feature">X</button>
                </div>
                <?php endif; ?>
            </div>
            <button type="button" id="add-feature" class="btn btn-success btn-sm mt-2">+ Add Feature</button>
        </div>



        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="1" <?php echo e(old('status', $package->status ?? 1) == 1 ? 'selected' : ''); ?>>Active</option>
                <option value="0" <?php echo e(old('status', $package->status ?? 1) == 0 ? 'selected' : ''); ?>>Inactive</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary"><?php echo e($buttonText); ?></button>
    </div>
</div>


<?php $__env->startSection('page-script'); ?>
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

    document.addEventListener('change', function(e) {
        // Show/hide modules when feature is checked
        if (e.target.classList.contains('feature-checkbox')) {
            const featureId = e.target.value;
            const moduleDiv = document.getElementById('modules_feature_' + featureId);
            if (e.target.checked) moduleDiv.classList.remove('d-none');
            else moduleDiv.classList.add('d-none');
        }

        // Select all modules for a specific feature
        if (e.target.classList.contains('select-all-modules')) {
            const featureId = e.target.dataset.feature;
            const modules = document.querySelectorAll('.feature_' + featureId);
            modules.forEach(mod => mod.checked = e.target.checked);
        }

        // Uncheck "Select All Modules" if any module unchecked manually
        if (e.target.classList.contains('module-checkbox')) {
            const featureId = e.target.className.match(/feature_(\d+)/)[1];
            const allModules = document.querySelectorAll('.feature_' + featureId);
            const allChecked = Array.from(allModules).every(m => m.checked);
            const selectAllCheckbox = document.querySelector('.select-all-modules[data-feature="' + featureId + '"]');
            if (selectAllCheckbox) selectAllCheckbox.checked = allChecked;
        }

        // Global Select All Features & Modules
        if (e.target.id === 'select_all_features_modules') {
            const checked = e.target.checked;

            // All feature checkboxes
            document.querySelectorAll('.feature-checkbox').forEach(f => f.checked = checked);

            // Show/hide modules accordingly
            document.querySelectorAll('[id^="modules_feature_"]').forEach(div => {
                if (checked) div.classList.remove('d-none');
                else div.classList.add('d-none');
            });

            // All module checkboxes
            document.querySelectorAll('.module-checkbox').forEach(m => m.checked = checked);

            // All feature-level select-all modules checkboxes
            document.querySelectorAll('.select-all-modules').forEach(s => s.checked = checked);
        }

        // Update global select all checkbox if manually unchecked/checked
        if (e.target.classList.contains('feature-checkbox') || e.target.classList.contains('module-checkbox') || e.target.classList.contains('select-all-modules')) {
            const allFeatures = document.querySelectorAll('.feature-checkbox');
            const allModules = document.querySelectorAll('.module-checkbox');
            const allFeatureModules = document.querySelectorAll('.select-all-modules');

            const globalCheckbox = document.getElementById('select_all_features_modules');

            const allChecked = Array.from(allFeatures).every(f => f.checked) &&
                Array.from(allModules).every(m => m.checked) &&
                Array.from(allFeatureModules).every(s => s.checked);

            if (globalCheckbox) globalCheckbox.checked = allChecked;
        }
    });



    //// Feature Mask
    document.getElementById('add-feature').addEventListener('click', function() {
        const wrapper = document.getElementById('features-wrapper');
        const featureCount = wrapper.querySelectorAll('input').length + 1;
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `
                <input type="text" name="features_mask[]" class="form-control" placeholder="Feature ${featureCount}">
                <button type="button" class="btn btn-danger remove-feature">X</button>
            `;
        wrapper.appendChild(div);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-feature')) {
            e.target.closest('.input-group').remove();
        }
    });
</script>
<?php $__env->stopSection(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/packages/_form.blade.php ENDPATH**/ ?>