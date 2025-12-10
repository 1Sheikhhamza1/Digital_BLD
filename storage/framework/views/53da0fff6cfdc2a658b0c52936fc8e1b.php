<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Top Navigation Bar with Tabs and Info -->
    <div class="top-navbar">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="index-tab" data-bs-toggle="tab" data-bs-target="#index" type="button" role="tab" aria-controls="index" aria-selected="false">Index</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="appellate-tab" data-bs-toggle="tab" data-bs-target="#appellate" type="button" role="tab" aria-controls="appellate" aria-selected="true">Appellate Division</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="highcourt-tab" data-bs-toggle="tab" data-bs-target="#highcourt" type="button" role="tab" aria-controls="highcourt" aria-selected="false">High Court Division</button>
            </li>
        </ul>
        <div class="info-text mt-2 mt-md-0">
            VOLUME <?php echo e($volumeData->number); ?>

        </div>
    </div>

    <div class="content-area">
        <div class="tab-content" id="myTabContent">
            <!-- Index Tab Content -->
            <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="index-tab">
                <div class="row">
                    <!-- Example of displaying PDF using iframe -->
                    <div class="col-12">
                        <?php if(!empty($volumeData->index_file) && file_exists(public_path('uploads/volume/pdfs/' . $volumeData->index_file))): ?>
                        <iframe src="<?php echo e(asset('uploads/volume/pdfs/' . $volumeData->index_file)); ?>" width="100%" height="600px"></iframe>
                        <?php else: ?>
                        <p>File not found.</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- Appellate Division Tab Content -->
            <div class="tab-pane fade" id="appellate" role="tabpanel" aria-labelledby="appellate-tab">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php $__empty_1 = true; $__currentLoopData = $appellateDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col d-flex">
                        <a class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm text-decoration-none"
                            href="<?php echo e(route('subscriber.singleDecision', [$decision->id, Crypt::encrypt('legalDecision')])); ?>">

                            
                            <h5 class="card-title clamp-3 mb-2">
                                <?php echo html_entity_decode($decision->parties, ENT_QUOTES | ENT_HTML5); ?>

                            </h5>

                            
                            <div class="text-sm text-dark clamp-1 text-center mb-2">
                                <?php echo $decision->case_no; ?>

                            </div>

                            
                            <p class="card-text clamp-4 flex-grow-1">
                                <?php echo strip_tags($decision->judgment) ?? 'No description available.'; ?>

                            </p>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No decisions found for Appellate Division.</p>
                    <?php endif; ?>
                </div>


                <!-- Pagination -->
                <div class="mt-4">
                    <?php echo e($appellateDecisions->links('pagination::bootstrap-5')); ?>

                </div>
            </div>

            <!-- High Court Division Tab Content -->
            <div class="tab-pane fade" id="highcourt" role="tabpanel" aria-labelledby="highcourt-tab">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php $__empty_1 = true; $__currentLoopData = $highCourtDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col d-flex">
                        <a class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm text-decoration-none"
                            href="<?php echo e(route('subscriber.singleDecision', [$decision->id, Crypt::encrypt('legalDecision')])); ?>">

                            
                            <h5 class="card-title clamp-3 mb-2">
                                <?php echo html_entity_decode($decision->parties, ENT_QUOTES | ENT_HTML5); ?>

                            </h5>

                            
                            <div class="text-sm text-dark clamp-1 text-center mb-2">
                                <?php echo $decision->case_no; ?>

                            </div>

                            
                            <p class="card-text clamp-4 flex-grow-1">
                                <?php echo strip_tags($decision->judgment) ?? 'No description available.'; ?>

                            </p>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No decisions found for High Court Division.</p>
                    <?php endif; ?>
                </div>


                <!-- Pagination -->
                <div class="mt-4">
                    <?php echo e($highCourtDecisions->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>



</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/legal_decision_grid.blade.php ENDPATH**/ ?>