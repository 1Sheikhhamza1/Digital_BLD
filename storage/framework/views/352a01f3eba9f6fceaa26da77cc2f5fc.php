

<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>
<style>
    .force-bullet {
        list-style: disc !important;
        margin-left: 20px !important;
        padding-left: 0 !important;
        display: block !important;
    }
    .force-bullet li {
        margin-bottom: 5px;
    }
</style>

<main class="main">
    <?php $__currentLoopData = $homepageSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($section['display'] ?? 1) == 1): ?>
            <?php if ($__env->exists("frontend.homepage.$key", ['section' => $section])) echo $__env->make("frontend.homepage.$key", ['section' => $section], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/frontend/home.blade.php ENDPATH**/ ?>