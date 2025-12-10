
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
          <h2 class="banner-inner-title">Testimonials</h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="<?php echo e(route('clientfeedback')); ?>"> Home / </a> Testimonials</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials section">

    <section id="testimonials" class="section">
        <div class="container">
            <div class="row gy-4">
                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                    <div class="testimonial-item">
                        <img src="<?php echo e(asset('uploads/feedback/image/'.$feedback->client_photo)); ?>" class="testimonial-img" alt="<?php echo e($feedback->name ?? 'Client'); ?>">
                        <h3><?php echo e($feedback->client_name ?? ''); ?></h3>
                        <h4><?php echo e($feedback->client_position ?? ''); ?></h4>
                        <div class="stars">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <=$feedback->rating): ?>
                                <i class="bi bi-star-fill"></i>
                                <?php else: ?>
                                <i class="bi bi-star"></i>
                                <?php endif; ?>
                                <?php endfor; ?>
                        </div>

                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span><?php echo e(limit_description(strip_tags($feedback->feedback), 150)); ?></span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/feedbacks.blade.php ENDPATH**/ ?>