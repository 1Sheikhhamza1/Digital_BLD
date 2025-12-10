
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>

<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
  <div class="banner-table">
    <div class="banner-table-cell">
      <div class="container">
        <div class="banner-inner-content">
          <h2 class="banner-inner-title">Our Team</h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="<?php echo e(route('team')); ?>"> Home / </a> Team</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials section">

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php $__currentLoopData = $teams ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
          <div class="testimonial-item">
            <img src="<?php echo e(asset('uploads/teams/' . $team->photo)); ?>" class="img-fluid" alt="<?php echo e($team->title.' BLD team gallery'); ?>">
            <div class="portfolio-info">
              <h4><?php echo e($team->name); ?></h4>
              <p><?php echo e($team->designation ?? ''); ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/teams.blade.php ENDPATH**/ ?>