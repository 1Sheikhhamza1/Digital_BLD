
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
          <h2 class="banner-inner-title">Our Subscriptions</h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="<?php echo e(route('package')); ?>"> Home / </a> Packages</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section id="pricing" class="pricing section-padding light-background">
  <div class="container">
    <div class="row gy-4">
      <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      // Decode features JSON into array
      $features = json_decode($package->features_mask, true) ?: [];

      // Determine classes and badge
      $colClass = 'col-lg-4';
      $pricingItemClass = 'pricing-item';
      $popularBadge = '';
      if ($package->is_featured) {
        $colClass .= ' active';
        $pricingItemClass .= ' featured';
        $popularBadge = '<p class="popular">' . ($package->highlight_badge ?? 'Popular') . '</p>';
      }

      $currency = $package->currency ?? '৳';
      $buttonText = $package->button_text ?? 'Sign up Now';
      $durationTextMap = [
        'monthly' => '/ month',
        'quarterly' => '/ quarter',
        'half_yearly' => '/ half year',
        'yearly' => '/ year',
      ];
      $durationText = $durationTextMap[$package->duration_type] ?? '/ month';
      $originalPrice = $package->price;
      $discount = $package->discount;
      $type = $package->discount_type;

      $finalPrice = $originalPrice; // default

      if (!empty($discount)) {
        if ($type === '%') {
          $finalPrice = $originalPrice - ($originalPrice * ($discount / 100));
        } elseif ($type === 'Tk') {
          $finalPrice = $originalPrice - $discount;
        }
      }
      ?>

      <div class="<?php echo e($colClass); ?>" data-aos="zoom-in" data-aos-delay="<?php echo e(100 + ($loop->index * 100)); ?>">
        <div class="<?php echo e($pricingItemClass); ?>">
          <?php echo $popularBadge; ?>

          <h3><?php echo e($package->name); ?></h3>
          <p class="description"><?php echo e($package->description); ?></p>
          <?php if($package->id != 3): ?>
          <h4>

            
            <?php if(!empty($discount)): ?>
            <!-- <small style="color: #ffffffff; font-weight: bold; display:block; font-size:25px">
                            Special Sale Price
                        </small> -->

            
            <sup><?php echo e($currency); ?></sup>
            <?php echo e(number_format($finalPrice, 0)); ?>


            
            <span> <?php echo e($durationText); ?> </span>
            <br>

            
            <span style="text-decoration: line-through; color: #6c757d;">
              <?php echo e($currency); ?> <?php echo e(number_format($originalPrice, 0)); ?>

            </span>

            
            <span style="color: #28a745; font-weight:bold; margin-left:10px">
              -<?php echo e($discount); ?><?php echo e($type); ?>

            </span>

            <?php else: ?>
            
            <sup><?php echo e($currency); ?></sup><?php echo e(number_format($originalPrice, 0)); ?>

            <span> <?php echo e($durationText); ?></span>
            <?php endif; ?>

          </h4>
          <?php endif; ?>
          <div class="pricing-content">
            <ul>
              <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              // If feature string starts with "na:" consider it as not available feature, else available
              $isAvailable = true;
              $featureText = $feature;
              if (stripos($feature, 'na:') === 0) {
              $isAvailable = false;
              $featureText = substr($feature, 3); // remove 'na:' prefix
              }
              ?>
              <li class="<?php echo e($isAvailable ? '' : 'na'); ?>">
                <?php if($isAvailable): ?>
                <span class="number-circle small"><i class="bi bi-check"></i></span>
                <?php else: ?>
                <i class="bi bi-x"></i>
                <?php endif; ?>
                <span><?php echo e($featureText); ?></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php if($package->id != 3): ?>
            <a href="<?php echo e(route('subscriber.subscription.form', $package->id)); ?>" class="cta-btn"><?php echo e($buttonText); ?></a>
            <?php else: ?>
            <a href="<?php echo e(route('content', 'contact')); ?>" class="cta-btn"><?php echo e($buttonText); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/packages/index.blade.php ENDPATH**/ ?>