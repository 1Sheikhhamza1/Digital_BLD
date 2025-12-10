
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
          <h2 class="banner-inner-title">Our Blogs</h2>
          <!-- <ul class="xs-breadcumb">
            <li><a href="<?php echo e(route('blog')); ?>"> Home / </a> Blogs</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="xs-blog-sec section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="blog-content-item">
          <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-12">
              <div class="single-blog-item">
                <div class="blog-post-img">
                  <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                    <img src="<?php echo e(asset('uploads/blogs/' . $blog->featured_image)); ?>" alt="<?php echo e($blog->title); ?>">
                  </a>
                  <div class="blog-date-info">
                    <label><?php echo e($blog->created_at->format('d')); ?></label>
                    <span><?php echo e($blog->created_at->format('M')); ?></span>
                  </div>

                </div>
                <div class="blog-meta">
                  <ul>
                    <li class="author">
                      <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                        <img src="<?php echo e(asset('frontend/assets/img/default-user.png')); ?>" alt="">
                        by <span><?php echo e($blog->author); ?></span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon icon-calendar-full"></i>
                        <?php echo e($blog->created_at->format('d M, Y')); ?>

                      </a>
                    </li>
                  </ul>
                </div>
                <h3 class="xs-blog-title">
                  <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                    <?php echo e($blog->title); ?>

                  </a>
                </h3>
                <p><?php echo Str::limit(strip_tags($blog->content), 300); ?></p>
                <div class="read-more-btn">
                  <a href="<?php echo e(route('blog.details', $blog->slug)); ?>" class="xs-btn sm-btn">Read More</a>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
          <div class="pagination-wraper">
            <?php echo e($blogs->links('pagination::bootstrap-4')); ?>

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\8122025public_html\public_html\resources\views/frontend/blogs/index.blade.php ENDPATH**/ ?>