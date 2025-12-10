<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-4">
    <h3 class="mb-4">Bookmarks</h3>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
        <?php $__empty_1 = true; $__currentLoopData = $bookmarkedDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col d-flex">
            <div class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm">
                <a href="<?php echo e(route('subscriber.singleDecision', [$item->id, Crypt::encrypt('bookmark')])); ?>" class=" text-decoration-none">
                    
                    <h5 class="card-title clamp-3 mb-2">
                        <?php echo $item->parties; ?>

                    </h5>

                    
                    <div class="text-sm text-dark clamp-1 text-center mb-2">
                        <?php echo $item->case_no; ?>

                    </div>

                    
                    <p class="card-text clamp-4 flex-grow-1">
                        <?php echo strip_tags($item->judgment) ?? 'No description available.'; ?>

                    </p>
                </a>
                <form action="<?php echo e(route('subscriber.bookmark.destroy', $item->id)); ?>" method="POST" style="display: inline;" 
                onsubmit="return confirm('Are you sure you want to remove this bookmark?');" class="d-flex justify-content-end">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" style="border: none; background: none; padding: 0;" title="Remove from bookmark items">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </form>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No results found.</p>
        <?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/bookmark.blade.php ENDPATH**/ ?>