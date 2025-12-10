
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Service'); ?>

<?php $__env->startSection('content'); ?>

<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
  <div class="banner-table">
    <div class="banner-table-cell">
      <div class="container">
        <div class="banner-inner-content">
          <h2 class="banner-inner-title">Our Services</h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="<?php echo e(route('service')); ?>"> Home / </a> Services</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>
<section class="service-sec service-v2-sec service-inner-sec section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="service-sidebar">
          <div class="widgets">
            <h3 class="widget-title"><span>Lets</span> Subscribe</h3>
            <ul class="brochures-list">
              <li><a href="<?php echo e(route('subscriber.register')); ?>"><i class="fa fa-user-plus"></i>Sign Up</a></li>
              <li><a href="<?php echo e(route('subscriber.login')); ?>"><i class="fa fa-sign-in"></i>Sign In</a></li>
            </ul>
          </div>

          
        </div>
      </div>
      <div class="col-lg-9 col-md-8">
        <div class="row">
          <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 wow fadeInUp p-0" data-wow-duration="1.5s" data-wow-delay="<?php echo e(300 + $index * 100); ?>ms">
            <a href="<?php echo e(route('service.details', $service->slug)); ?>">
              <div class="single-service">
                <div class="service-img">
                  <?php if(!empty($service->image)): ?>
                  <img src="<?php echo e(asset('uploads/services/image/' . $service->image)); ?>" alt="<?php echo e($service->name); ?>">
                  <?php endif; ?>

                  <?php if(!empty($service->icon)): ?>
                  <img src="<?php echo e(asset('uploads/services/icon/' . $service->icon)); ?>" alt="<?php echo e($service->name); ?> Icon">
                  <?php endif; ?>
                </div>
                <h3 class="xs-service-title"><a href="<?php echo e(route('service.details', $service->slug)); ?>"><?php echo e($service->name); ?></a></h3>
                <p><?php echo e(limit_description(strip_tags($service->description), 150)); ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/services/index.blade.php ENDPATH**/ ?>