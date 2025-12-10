

<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>

<!-- ===== Banner Section ===== -->
<section class="banner-inner-sec" style="background-image:url('/frontend/assets/img/service-page-bg.jpg')">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content text-center text-white">
                    <h2 class="banner-inner-title">Frequently Asked Questions</h2>
                    <!-- <ul class="xs-breadcumb list-inline">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a> / FAQ</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="service-inner-sec single-service-sec section-padding py-5 bg-light">
        <div class="container">
            
            <?php echo $__env->make('frontend._faq', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .title-line {
        width: 60px;
        height: 3px;
        background: #0d6efd;
        margin-top: 10px;
        border-radius: 3px;
    }

    .accordion-button {
        background-color: #fff;
        color: #222;
        transition: all 0.3s ease;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed) {
        background-color: #0d6efd;
        color: #fff;
    }

    .accordion-item {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
    }

    .accordion-body {
        background-color: #fafafa;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/faq.blade.php ENDPATH**/ ?>