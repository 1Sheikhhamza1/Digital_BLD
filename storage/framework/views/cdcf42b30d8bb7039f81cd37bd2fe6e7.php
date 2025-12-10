
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', $service->name); ?>

<?php $__env->startSection('content'); ?>

<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content">
                    <h2 class="banner-inner-title"><?php echo e($service->name); ?></h2>
                    <!-- <ul class="xs-breadcumb">
                        <li><a href="<?php echo e(route('service')); ?>"> Home / </a> Services</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-inner-sec single-service-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="service-sidebar">
                    <div class="widgets">
                        <h3 class="widget-title"><span>Our</span> Services</h3>
                        <ul class="services-link-item">
                            <?php if($allServices!='' && count($allServices) > 0): ?>
                            <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e($currentSlug == $otherService->slug ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('service/' . $otherService->slug)); ?>">
                                    <?php echo e($otherService->name); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="widgets">
                        <h3 class="widget-title"><span>Lets</span> Subscribe</h3>
                        <ul class="brochures-list">
                            <li><a href="<?php echo e(route('subscriber.register')); ?>"><i class="fa fa-user-plus"></i>Sign Up</a></li>
                            <li><a href="<?php echo e(route('subscriber.login')); ?>"><i class="fa fa-sign-in"></i>Sign In</a></li>
                        </ul>
                    </div>
                </div><!-- srvice sidebar -->
            </div><!-- col end -->
            <div class="col-lg-9 col-md-8">
                <div class="main-single-service-content">
                    <div class="single-service-post-content">
                        <img src="<?php echo e(asset('uploads/services/banner/' . ($service->banner ?? '') )); ?>" alt="<?php echo e($service->name); ?>">
                        <p><?php echo $service->description; ?></p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/services/show.blade.php ENDPATH**/ ?>