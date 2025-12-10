<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Index'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php echo $__env->make('auth.subscribers.profile.volume_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="mt-4">
        <?php if(!empty($volumeData->index_file) && file_exists(public_path('uploads/volume/pdfs/' . $volumeData->index_file))): ?>
            <iframe src="<?php echo e(asset('uploads/volume/pdfs/' . $volumeData->index_file)); ?>" width="100%" height="600px"></iframe>
        <?php else: ?>
            <p>File not found.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/index.blade.php ENDPATH**/ ?>