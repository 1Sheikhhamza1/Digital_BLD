<?php $__env->startSection('content'); ?>
<style>
    .delete-btn {
        position: absolute;
        top: 6px;
        right: 6px;
        background: rgba(255, 0, 0, 0.8);
        color: #fff;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        z-index: 10000;
    }

    .delete-card-item {
        position: relative;
        z-index: 10000;
    }
</style>

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


    <h3 class="mb-4">Shared Legal Decision</h3>

    <!-- Files Grid -->
   

        <div class="row g-3">
            <?php $__empty_1 = true; $__currentLoopData = $sharedDecisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-6 col-md-4 col-lg-3">

                <div class="delete-card-item">

                    <form action="<?php echo e(route('subscriber.sharedDecision.delete', $share->id)); ?>"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this shared decision?')"
                        class="position-absolute"
                        style="top: 5px; right: 5px;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="delete-btn" title="Delete">
                            ✕
                        </button>
                    </form>

                    <!-- Existing clickable card -->
                    <a class="card-item"
                        href="<?php echo e(route('subscriber.sharedDecision', Crypt::encrypt($share->id))); ?>"
                        style="display:block; padding-top:35px;">

                        <?php if($share && $share->decision): ?>
                        <h5 class="card-title clamp-3 mb-2">
                            <?php echo html_entity_decode($share->decision->parties, ENT_QUOTES | ENT_HTML5); ?>

                        </h5>

                        <div class="text-sm text-dark clamp-1 text-center mb-2">
                            <?php echo $share->decision->case_no; ?>

                        </div>

                        <p class="card-text clamp-4 flex-grow-1">
                            <?php echo strip_tags($share->decision->judgment) ?? 'No description available.'; ?>

                        </p>

                        <p class="text-success">
                            Shared by: <?php echo e($share->sender->name ?? null); ?>

                        </p>
                        <?php endif; ?>

                    </a>

                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No decision yet.</p>
            <?php endif; ?>
        </div>
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
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/my_shared_decisions.blade.php ENDPATH**/ ?>