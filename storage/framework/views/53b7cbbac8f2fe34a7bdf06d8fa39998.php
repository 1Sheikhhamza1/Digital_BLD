<footer id="footer" class="footer dark-background">
  <div class="container footer-top">
    <div class="row">

      
      <div class="col-lg-3 col-md-6 mt-3">
        <a href="<?php echo e(route('home')); ?>" class="text-decoration-none">
          <?php
          $companyLogo = $footerData['company_logo'] ?? null;

          $logoPath = $companyLogo && file_exists(public_path('uploads/configuration/' . $companyLogo))
          ? asset('uploads/configuration/' . $companyLogo)
          : asset('frontend/assets/img/logo.png');
          ?>


          <img src="<?php echo e($logoPath); ?>" alt="Company Logo"
            style="width:120px;height:120px;margin-bottom:15px;display:block;">


          <span class="sitename text-start w-100" style="margin-left: 8px !important;">
            Digital BLD
          </span>
        </a>

        
        <?php
        $sslImage = $footerData['ssl_image'] ?? null;

        $sslPath = $sslImage && file_exists(public_path('uploads/configuration/' . $sslImage))
        ? asset('uploads/configuration/' . $sslImage)
        : asset('frontend/assets/img/ssl_logo.png');
        ?>

        <div class="col-sm-12 mt-5" style="margin-left: 7px !important;">
          <p class="p-0 m-0">Verified by</p>
          <img src="<?php echo e($sslPath); ?>" alt="SSL Commerz" style="width:150px;height:auto;">
      </div>
      </div>

      
      <div class="col-lg-3 col-md-3 footer-links">
        <h4><?php echo e($footerData['discover_section'] ?? 'Discover'); ?></h4>
        <ul>
          <?php $__empty_1 = true; $__currentLoopData = $discoverMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li><a href="<?php echo e(getPageUrl($menu)); ?>"><?php echo e($menu->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li><a href="#">No Menu Found</a></li>
          <?php endif; ?>
        </ul>
      </div>

      
      <div class="col-lg-3 col-md-3 footer-links">
        <h4><?php echo e($footerData['quick_link'] ?? 'Quick Links'); ?></h4>
        <ul>
          <?php $__empty_1 = true; $__currentLoopData = $quickMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li><a href="<?php echo e(getPageUrl($menu)); ?>"><?php echo e($menu->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li><a href="#">No Menu Found</a></li>
          <?php endif; ?>
        </ul>
      </div>

      
      <div class="col-lg-3 col-md-12 footer-links">
        <div class="footer-contact">
          <?php echo $footerData['contact_address'] ?? ''; ?>

        </div>
      </div>
    </div>


  </div>

  
  <div class="container copyright text-center mt-4">
    <?php echo $footerData['copy_right_text'] ?? ''; ?>

  </div>
</footer><?php /**PATH /home/bldlegalized/public_html/resources/views/layouts/footer.blade.php ENDPATH**/ ?>