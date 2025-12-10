<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row g-4">
        <main class="col-lg-9">
            <div class="search-summary">
                <div class="row d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-sm-10">
                        <span class="fw-semibold me-2">Search result for:</span>
                        <?php $__empty_1 = true; $__currentLoopData = $searchInputParams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <span class="badge bg-primary text-white text-capitalize">
                            <?php echo e(str_replace('_', ' ', $key)); ?>: <?php echo e($value); ?>

                        </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <span class="text-muted">All</span>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-2">
                        <strong><?php echo e($results->total()); ?></strong> results found
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
                <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col d-flex">
                    <div class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm">
                    <!-- <div class="result-number me-2">
                        <?php echo e($results->firstItem() + $index); ?>.
                    </div> -->

                    
                    <a href="<?php echo e(route('subscriber.singleDecision', [$item->id, Crypt::encrypt('showResults')])); ?>" class="text-decoration-none">

                        
                        <h5 class="card-title clamp-3 mb-2">
                            <?php echo $item->parties; ?>

                        </h5>

                        
                        <div class="text-sm text-dark clamp-1 text-center mb-2">
                            <?php echo $item->case_no; ?>

                        </div>

                        
                        <p class="card-text clamp-4 flex-grow-1">
                            <?php echo strip_tags($item->judgment ?? $item->summary ?? 'No summary available.'); ?>

                        </p>
                    </a>
                </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>No results found.</p>
                <?php endif; ?>
            </div>

            <div class="mt-4">
                <?php echo e($results->links('pagination::bootstrap-5')); ?>

            </div>
        </main>

        <aside class="col-lg-3 d-none d-lg-block">
            <div class="sidebar">
                <h5>Quick Links</h5>

                <a href="<?php echo e(route('subscriber.leagalSearch')); ?>" class="quick-link-item">
                    <i class="bi bi-pencil-square"></i>
                    <span>Modify Search</span>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="<?php echo e(route('subscriber.leagalSearch', ['new' => 1])); ?>" class="quick-link-item">
                    <i class="bi bi-search"></i>
                    <span>Search New</span>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>
            </div>
        </aside>

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/search_result.blade.php ENDPATH**/ ?>