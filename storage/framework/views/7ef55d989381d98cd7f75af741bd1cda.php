<div class="card card-success card-outline mb-4">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($buttonText); ?> Feature</h3>
    </div>
    <div class="card-body">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Feature Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $packageFeature->name ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Feature description</label>
            <input type="text" class="form-control" name="description" value="<?php echo e(old('description', $packageFeature->description ?? '')); ?>">
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e($buttonText); ?></button>
    </div>
</div>
<?php /**PATH /home/bldlegalized/public_html/resources/views/admin/package_features/_form.blade.php ENDPATH**/ ?>