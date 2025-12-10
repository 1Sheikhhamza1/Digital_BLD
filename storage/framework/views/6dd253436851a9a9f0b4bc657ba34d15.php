<section class="service-inner-sec single-service-sec section-padding py-5 bg-light about">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="inner-title"><a href="<?php echo e(route('faq')); ?>"><?php echo e($section['title'] ?? 'FAQ'); ?></a></H2>
                <p class="text-muted">Find answers to the most common questions below</p>
                <div class="title-line mx-auto"></div>
            </div>
            <?php echo $__env->make('frontend._faq', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </section><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/homepage/faq.blade.php ENDPATH**/ ?>