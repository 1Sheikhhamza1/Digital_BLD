<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Search Bar -->
    <div class="search-bar-container">
        <div class="input-group search-input-group position-relative" style="align-items:center;">
            <!-- Select2 Dropdown -->
            <select name="volume_number" id="volume_number" class="select2Data form-select" onchange="searchVolume(this.value)">
                <option value="">Search by volume number</option>
                <?php $__currentLoopData = $volumeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $volumeName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($id); ?>"> <?php echo e($volumeName); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <!-- Clear Button -->
            <button type="button" class="btn" onclick="clearVolumeSearch()" style="margin-left: 10px;"> Clear </button>
        </div>

    </div>

    <!-- Volume Grid -->
    <div class="volume-grid-container">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xl-8 g-4">
            <!-- Book Item (Repeat 16 times as in the image) -->
            <?php $__currentLoopData = $volume_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="book-item">
                    
                    <a class="book-icon-wrapper" href="<?php echo e(route('subscriber.volume.index', $volume->id)); ?>">
                        <img
                            src="<?php echo e($volume->image && file_exists(public_path('uploads/volume/'.$volume->image)) 
                        ? asset('uploads/volume/'.$volume->image) 
                        : asset('frontend/assets/img/book.png')); ?>"
                            alt="Volume Book">
                        <span class="book-number"><?php echo e($volume->number); ?></span>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <div class="col-sm-12 d-flex justify-content-center mt-5">
            <?php echo e($volume_list->links('pagination::bootstrap-5')); ?>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    const searchVolume = (selectedVolume) => {
        const url = "<?php echo e(route('subscriber.bldVolume')); ?>?volume=" + encodeURIComponent(selectedVolume);
        window.location.href = url;
    }
    const clearVolumeSearch = () => {
        const select = document.querySelector('select[name="volume_number"]');
        select.value = '';
        const baseUrl = "<?php echo e(route('subscriber.bldVolume')); ?>";
        window.location.href = baseUrl; // reload without query
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/bld_volume.blade.php ENDPATH**/ ?>