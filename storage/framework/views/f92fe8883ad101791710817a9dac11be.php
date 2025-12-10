<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="keywords" content="Digital Bangladesh Legal Decisions">
  <meta name="description" content="Digital Bangladesh Legal Decisions" />
  <meta name="distribution" content="global" />
  <meta name="coverage" content="Worldwide" />
  <meta name="revisit-after" content="1 day">
  <meta property="og:url" content="https://www.bldlegalized.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Digital Bangladesh Legal Decisions" />
  <meta property=fb:pages content="" />
  <meta property="og:title" content="Digital Bangladesh Legal Decisions" />
  <meta property="og:description" content="Digital Bangladesh Legal Decisions" />
  <meta property="og:image" content="<?php echo e(asset('assets/frontend/images/logo.png')); ?>" />
  <meta name="robots" content="index, follow">
  <meta name="Googlebot" content="index, follow" />
  <meta property="og:locale" content="bn_BD" />
  <meta property="og:locale:alternate" content="en_US" />
  <meta property="og:locale:alternate" content="en_GB" />
  <meta property="og:locale:alternate" content="fr_FR" />
  <meta property="og:locale:alternate" content="en_IN" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@Digital Bangladesh Legal Decisions">
  <meta name="twitter:title" content="Digital Bangladesh Legal Decisions">
  <meta name="twitter:description" content="Digital Bangladesh Legal Decisions">
  <meta name="twitter:image:src" content="<?php echo e(asset('assets/frontend/images/logo.png')); ?>">
  <link rel="alternate" href="https://www.bldlegalized.com" hreflang="en-us" />
  <link rel="canonical" href="https://www.bldlegalized.com/" />


  <link rel="shortcut icon" href="<?php echo e(url('assets/img/favicon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/favicon.png')); ?>" sizes="192x192">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('assets/img/apple-touch-icon.png')); ?>">
  <link href="https://fonts.googleapis.com/" rel="preconnect">
  <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link href="<?php echo e(asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('frontend/assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?php echo e(asset('frontend/assets/css/main.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom/custom.css')); ?>">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/fonts.css')); ?>">
  <style>
    .countdown-container {
      display: flex;
      align-items: center;
      /* background-color: #1a3c6b; */
      color: white;
      padding: 8px 15px;
      border-radius: 4px;
      font-family: Arial, sans-serif;
      gap: 12px;
      /* spacing between items */
    }

    .launch-text {
      font-size: 14px;
      font-weight: 600;
      white-space: nowrap;
    }

    .timer-unit {
      display: flex;
      flex-direction: column;
      align-items: center;
      line-height: 1;
    }

    .time-value {
      font-size: 20px;
      font-weight: 700;
    }

    .time-label {
      font-size: 10px;
      text-transform: uppercase;
      opacity: 0.8;
      margin-top: 2px;
    }

    .separator {
      font-size: 22px;
      font-weight: 700;
      margin: 0 2px;
      line-height: 1;
    }
  </style>
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <!-- <div class="container position-relative d-flex align-items-center"> -->
    <div class="container position-relative">

      <div class="row align-items-center">
        <!-- Left (col-2) -->
        <div class="col-2 d-flex justify-content-start">
          <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center me-auto">
            <img src="<?php echo e(asset('frontend/assets/img/logo.png')); ?>">
            <span class="sitename">Digital BLD</span>
          </a>
        </div>

        <!-- Center (col-4) -->
        <div class="col-6 d-flex justify-content-center">
          <div id="countdownArea" class="countdown-container">
            <div class="launch-text">Launching In:</div>

            <div class="timer-unit">
              <div class="time-value" id="days">00</div>
              <div class="time-label">Days</div>
            </div>
            <div class="separator">:</div>

            <div class="timer-unit">
              <div class="time-value" id="hours">00</div>
              <div class="time-label">Hours</div>
            </div>
            <div class="separator">:</div>

            <div class="timer-unit">
              <div class="time-value" id="minutes">00</div>
              <div class="time-label">Mins</div>
            </div>
            <div class="separator">:</div>

            <div class="timer-unit">
              <div class="time-value" id="seconds">00</div>
              <div class="time-label">Secs</div>
            </div>
          </div>
        </div>

        <!-- Right (col-6) -->
        <div class="col-4 d-flex justify-content-end">
          <nav id="navmenu" class="navmenu">
            <ul>
              <?php if(isset($pages)): ?>
              <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="<?php echo e(request()->is($page->slug) ? 'active' : ''); ?> <?php echo e($page->children && $page->children->count() ? 'dropdown' : ''); ?>">
                <a href="<?php echo e(getPageUrl($page)); ?>">
                  <span><?php echo e($page->title); ?></span>
                  <?php if($page->children && $page->children->count()): ?>
                  <i class="bi bi-chevron-down toggle-dropdown"></i>
                  <?php endif; ?>
                </a>

                <?php if($page->children && $page->children->count()): ?>
                <ul>
                  <?php $__currentLoopData = $page->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="<?php echo e($child->children && $child->children->count() ? 'dropdown' : ''); ?>">
                    <a href="<?php echo e(getPageUrl($child)); ?>">
                      <span><?php echo e($child->title); ?></span>
                      <?php if($child->children && $child->children->count()): ?>
                      <i class="bi bi-chevron-down toggle-dropdown"></i>
                      <?php endif; ?>
                    </a>

                    <?php if($child->children && $child->children->count()): ?>
                    <ul>
                      <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <a href="<?php echo e(getPageUrl($subChild)); ?>">
                          <?php echo e($subChild->title); ?>

                        </a>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

              <li>
                <?php if(auth()->guard('subscriber')->check()): ?>
                <?php echo $__env->make('auth.subscribers.layouts._profile', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                <a href="<?php echo e(route('subscriber.login')); ?>" class="login-btn">Login</a>
                <?php endif; ?>
              </li>

            </ul>


            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
        </div>
      </div>





    </div>
  </header>


  <?php echo $__env->yieldContent('content'); ?>

  <?php $__env->startSection('footer'); ?>
  <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <!-- <div id="preloader"></div> -->

  <script src="<?php echo e(asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/php-email-form/validate.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/aos/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:+0",
        maxDate: new Date()
      });
    });
  </script>

  <script>
    // Disable right-click
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });

    // Disable text selection
    document.addEventListener('selectstart', function(e) {
      e.preventDefault();
    });
    document.addEventListener('copy', function(e) {
      e.preventDefault();
    });

    // Disable drag
    document.addEventListener('dragstart', function(e) {
      e.preventDefault();
    });

    // Disable common keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      // Block F12 (DevTools)
      if (e.key === "F12") {
        e.preventDefault();
      }

      // Block Ctrl+Shift+I or Cmd+Option+I
      if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key.toLowerCase() === 'i') {
        e.preventDefault();
      }

      // Block Ctrl+S or Cmd+S (Save page)
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 's') {
        e.preventDefault();
      }

      // Block Ctrl+U or Cmd+U (View source)
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'u') {
        e.preventDefault();
      }

      // Block Ctrl+C / Ctrl+X / Ctrl+V (Copy / Cut / Paste)
      if ((e.ctrlKey || e.metaKey) && ['c', 'x', 'v', 'a', 'p'].includes(e.key.toLowerCase())) {
        e.preventDefault();
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      document.body.style.userSelect = 'none';
      document.body.style.webkitUserSelect = 'none';
      document.body.style.msUserSelect = 'none';
    });
  </script>
  <script>
    function startCountdown() {
      const target = new Date("2025-11-24T16:00:00");

      function update() {
        const now = new Date();
        const diff = target - now;

        if (diff <= 0) {
          document.getElementById("countdownArea").style.display = "none";
          return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        document.getElementById("days").innerText = String(days).padStart(2, "0");
        document.getElementById("hours").innerText = String(hours).padStart(2, "0");
        document.getElementById("minutes").innerText = String(minutes).padStart(2, "0");
        document.getElementById("seconds").innerText = String(seconds).padStart(2, "0");
      }

      update();
      setInterval(update, 1000);
    }

    startCountdown();
  </script>




  <?php echo $__env->yieldSection(); ?>

  <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH /home/bldlegalized/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>