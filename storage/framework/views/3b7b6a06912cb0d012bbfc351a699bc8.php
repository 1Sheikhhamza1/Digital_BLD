<?php $__env->startSection('content'); ?>

<div class="container py-4">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>


    <h3 class="mb-4">Legal Decision in "<?php echo e($folder->name); ?>"</h3>

    <!-- Files Grid -->
    <form action="<?php echo e(route('subscriber.files.downloadMultiple')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php $__empty_1 = true; $__currentLoopData = $copiedDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if(isset($decision->decision)): ?>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="card text-start position-relative shadow-sm h-100">

                    
                    <div class="position-absolute top-0 end-0 m-1 dropdown">
                        <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="<?php echo e(route('subscriber.legal-search.downloadPdf', $decision->decision->id)); ?>" class="dropdown-item">
                                    <i class="bi bi-download me-1"></i> Download
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item text-danger"
                                    onclick="event.preventDefault(); if(confirm('Remove this decision from the folder?')) { removeFromFolder(<?php echo e($decision->decision->id); ?>, <?php echo e($folder->id); ?>); }">
                                    <i class="bi bi-trash me-1"></i> Remove from folder
                                </a>
                            </li>
                        </ul>
                    </div>

                    
                    <a class="card-item d-flex flex-column h-100 w-100 p-3 border rounded shadow-sm text-decoration-none"
                        href="<?php echo e(route('subscriber.myDecision', Crypt::encrypt($decision->id))); ?>">

                        
                        <h5 class="card-title clamp-3 mb-2">
                            <?php echo $decision->decision->parties; ?>

                        </h5>

                        
                        <div class="text-sm text-dark clamp-1 text-center mb-2">
                            <?php echo $decision->decision->case_no; ?>

                        </div>

                        
                        <p class="card-text clamp-4 flex-grow-1">
                            <?php echo strip_tags($decision->decision->judgment) ?? 'No description available.'; ?>

                        </p>
                    </a>
                </div>
            </div>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No decision yet.</p>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function removeFromFolder(decisionId, folderId) {
        fetch("<?php echo e(route('subscriber.remove-decision-from-folder')); ?>", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/my_folder_files.blade.php ENDPATH**/ ?>