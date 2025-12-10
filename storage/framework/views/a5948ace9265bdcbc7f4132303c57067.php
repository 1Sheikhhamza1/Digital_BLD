
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>


<section class="banner-inner-sec" style="background-image: url('<?php echo e(asset('uploads/pages/image/' . ($contents['content']->image ?? '') )); ?>')">
  <div class="banner-table">
    <div class="banner-table-cell">
      <div class="container">
        <div class="banner-inner-content">
          <h2 class="banner-inner-title"><?php echo e($contents['content']->title ?? ''); ?></h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="/"> Home / <?php echo e($contents['parentMenu'] ? $contents['parentMenu'].' / ' : ''); ?></a> <?php echo e($contents['content']->title); ?></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="service-inner-sec single-service-sec section-padding">
  <div class="container">
    <div class="row">
      <!-- <div class="col-lg-3 col-md-4">
        <div class="service-sidebar">
          <div class="widgets">
            <h3 class="widget-title"><span><?php echo e($contents['parentMenu']); ?></span> Pages</h3>
            <ul class="services-link-item">
              <?php if($contents['othersPages']!='' && count($contents['othersPages']) > 0): ?>
              <?php $__currentLoopData = $contents['othersPages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($contents['parentMenu']): ?>
              <li class="<?php echo e($currentSlug == $otherPage->slug ? 'active' : ''); ?>">
                <a href="<?php echo e(url('content/' . $otherPage->parent->slug . '/' . $otherPage->slug)); ?>">
                  <?php echo e($otherPage->title); ?>

                </a></li>
              <?php else: ?>
              <li class="<?php echo e($currentSlug == $otherPage->slug ? 'active' : ''); ?>">
                <a href="<?php echo e(url('content/' . $otherPage->slug)); ?>">
                  <?php echo e($otherPage->title); ?>

                </a></li>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

              <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
            </ul>
          </div>

          <div class="widgets">
            <h3 class="widget-title"><span>Lets</span> Subscribe</h3>
            <ul class="brochures-list">
              <li><a href="<?php echo e(route('subscriber.register')); ?>"><i class="fa fa-user-plus"></i>Sign Up</a></li>
              <li><a href="<?php echo e(route('subscriber.login')); ?>"><i class="fa fa-sign-in"></i>Sign In</a></li>
            </ul>
          </div>

          

          
        </div>
      </div> -->
      <div class="col-lg-12 col-md-8">
        <div class="main-single-service-content">
          <img src="assets/images/services/single-post-img.jpg" alt="">
          <p><?php echo $contents['content']->content ?? ''; ?></p>
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
<?php if(session('scroll_to')): ?>
<script>
  if ({
      {
        session() - > has('scroll_to') ? 'true' : 'false'
      }
    }) {
    document.addEventListener('DOMContentLoaded', () => {
      const selector = "<?php echo e(session('scroll_to')); ?>";
      const el = document.querySelector(selector);
      if (el) {
        const headerOffset = document.querySelector('header')?.offsetHeight || 0;
        const elementRect = el.getBoundingClientRect().top;
        const offsetPosition = elementRect + window.pageYOffset - headerOffset - 10; // 10px extra spacing

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });

        el.classList.add('flash-highlight');
        setTimeout(() => el.classList.remove('flash-highlight'), 2000);
      }
    });
  }
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/article.blade.php ENDPATH**/ ?>