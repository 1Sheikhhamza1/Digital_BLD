<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom/custom.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom/dashboard.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom/calender.css')); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="<?php echo e(asset('assets/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/fonts.css')); ?>">
  <link rel="shortcut icon" href="<?php echo e(url('assets/img/favicon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/favicon.png')); ?>" sizes="192x192">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('assets/img/favicon.png')); ?>">
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand logo d-flex align-items-center" href="<?php echo e(route('home')); ?>">
        <img src="<?php echo e(asset('frontend/assets/img/logo.png')); ?>">
        <span class="sitename">Digital BLD</span>
      </a>

      <?php
      $today = now()->format('d F, Y');
      $isDashboard = Route::currentRouteName() === 'subscriber.dashboard';
      ?>

      <div class="d-flex align-items-center ms-auto">
        <?php if($isDashboard): ?>
        <span class="navbar-text me-3 d-none d-md-inline">
          <?php if(!empty($hasAnySubscription?->activeSubscription?->package?->name)): ?>
          Package <br />
          <span class="fw-bold"><?php echo e($hasAnySubscription->activeSubscription->package->name); ?></span> |
          <?php endif; ?>
          <?php echo e($today); ?>

        </span>

        <!-- <i class="bi bi-bell mx-2"></i> -->
        <?php else: ?>
        <?php echo $__env->make('auth.subscribers.layouts._nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <?php if(auth()->guard('subscriber')->check()): ?>
        <?php echo $__env->make('auth.subscribers.layouts._profile', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
      </div>

    </div>

  </nav>
  <form id="logoutForm" action="<?php echo e(route('subscriber.logout')); ?>" method="POST" style="display:none;">
    <?php echo csrf_field(); ?>
  </form>

  <?php echo $__env->yieldContent('content'); ?>


  <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/select2/select2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
  <script>
    $('.select2Data').select2({
      placeholder: "Select a user",
      // no allowClear → no cross button
      dropdownParent: $('#shareModal'),
      width: '100%',
      minimumInputLength: 1,
      minimumResultsForSearch: 0,
      matcher: function(params, data) {
        if ($.trim(params.term) === '') {
          return null; // don’t show anything until user types
        }

        let text = data.text.split('(')[0].trim();
        let words = text.split(/\s+/);
        let term = params.term.toLowerCase();

        let isMatch = words.some(word => word.toLowerCase().startsWith(term));

        return isMatch ? data : null;
      }
    });


    $('.select2Data').not('#shareModal .select2Data').select2({
      // allowClear: true
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



  <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH E:\8122025public_html\public_html\resources\views/auth/subscribers/layouts/app.blade.php ENDPATH**/ ?>