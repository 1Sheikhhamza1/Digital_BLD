<section id="services" class="how-it-works section light-background about">
    <div class="container">
        <h2 class="inner-title"><a href="#"><?php echo e($section['title'] ?? 'How Digital BLD Works?'); ?></a></h2>
        <p><?php echo $homepageData['howToBldWorks'] ? $homepageData['howToBldWorks']->content : ''; ?></p>
        <?php if(isset($homepageData['howToBldWorks']) && $homepageData['howToBldWorks']!=""): ?>
        <div class="row gy-4">

            <?php if(isset($homepageData['howToBldWorks']->children) && count($homepageData['howToBldWorks']->children)): ?>
            <?php $__currentLoopData = $homepageData['howToBldWorks']->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $howToWorks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="works-item">
                    <div class="number-circle large"><?php echo e($loop->iteration); ?></div>
                    <a href="#">
                        <h3><?php echo e($howToWorks->title); ?></h3>
                    </a>
                    <p><?php echo $howToWorks->content; ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section><?php /**PATH E:\8122025public_html\public_html\resources\views/frontend/homepage/how-to-works.blade.php ENDPATH**/ ?>