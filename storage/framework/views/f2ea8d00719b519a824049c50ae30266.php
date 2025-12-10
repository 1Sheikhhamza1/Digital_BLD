
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>

<section id="portfolio" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Photo Gallery</h2>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <?php $__currentLoopData = $photos ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $categorySlug = isset($photo->category) ? Str::slug($photo->category->name) : 'uncategorized';
                    ?>
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo e($categorySlug); ?>">
                        <img src="<?php echo e(asset('uploads/photos/' . $photo->image)); ?>" class="img-fluid" alt="<?php echo e($photo->title.' BLD photo gallery'); ?>">
                        <div class="portfolio-info">
                            <h4><?php echo e($photo->title); ?></h4>
                            <p><?php echo e(format_date($photo->created_at) ?? ''); ?></p>
                            <a href="<?php echo e(asset('uploads/photos/' . $photo->image)); ?>" title="<?php echo e($photo->title); ?>"
                                data-gallery="portfolio-gallery-<?php echo e($categorySlug); ?>" class="glightbox preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="col-sm-12 d-flex align-items-center justify-content-center mt-5"><?php echo e($photos->links('pagination::bootstrap-4')); ?></div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/photos.blade.php ENDPATH**/ ?>