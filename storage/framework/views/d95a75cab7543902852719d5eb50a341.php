
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
                    <h2 class="banner-inner-title"><?php echo e($blog->title); ?></h2>
                    <!-- <ul class="xs-breadcumb">
                        <li><a href="<?php echo e(route('blog')); ?>"> Home / </a> Blogs</li>
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

                    <!-- Related Blogs Section -->
                    <div class="widgets">
            <h3 class="widget-title"><span>Related</span> Blogs</h3>
            <div class="related-blogs">
                <?php if($allBlogs!='' && count($allBlogs) > 0): ?>
                    <?php $__currentLoopData = $allBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="related-blog-card <?php echo e($currentSlug == $otherBlog->slug ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('blog/' . $otherBlog->slug)); ?>">
                                <div class="blog-thumb">
                                    <img src="<?php echo e(asset('uploads/blogs/' . $otherBlog->featured_image)); ?>" 
                                         alt="<?php echo e($otherBlog->title); ?>">
                                </div>
                                <div class="blog-info">
                                    <h5><?php echo e(\Illuminate\Support\Str::limit($otherBlog->title, 50)); ?></h5>
                                    <span class="blog-date">
                                        <i class="fa fa-calendar"></i> 
                                        <?php echo e(\Carbon\Carbon::parse($otherBlog->created_at)->format('M d, Y')); ?>

                                    </span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
                </div><!-- service sidebar -->
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="main-single-blog-content">
                    <div class="single-blog-post-content">
                        <img src="<?php echo e(asset('uploads/blogs/' . ($blog->featured_image ?? '') )); ?>" alt="<?php echo e($blog->title); ?>">
                        <p><?php echo $blog->content; ?></p>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/blogs/show.blade.php ENDPATH**/ ?>