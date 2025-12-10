<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | Appellate Division'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php echo $__env->make('auth.subscribers.profile.volume_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
        <?php $__empty_1 = true; $__currentLoopData = $appellateDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col d-flex">
                <a class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm text-decoration-none"
                   href="<?php echo e(route('subscriber.singleDecision', [$decision->id, Crypt::encrypt('legalDecisionAppellate')])); ?>">
                    <h5 class="card-title clamp-3 mb-2"><?php echo html_entity_decode($decision->parties); ?></h5>
                    <div class="text-sm text-dark clamp-1 text-center mb-2"><?php echo $decision->case_no; ?></div>
                    <p class="card-text clamp-4 flex-grow-1"><?php echo strip_tags($decision->judgment); ?></p>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No decisions found for Appellate Division.</p>
        <?php endif; ?>
    </div>

    <div class="mt-4">
        <?php echo e($appellateDecisions->links('pagination::bootstrap-5')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\8122025public_html\public_html\resources\views/auth/subscribers/profile/appellate.blade.php ENDPATH**/ ?>