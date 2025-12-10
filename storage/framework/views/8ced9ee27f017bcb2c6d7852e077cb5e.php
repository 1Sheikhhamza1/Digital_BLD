<section id="clients" class="clients section about">

        <div class="container section-title" data-aos="fade-up">
            <h2 class="inner-title"><a href="#"><?php echo e($section['title'] ?? 'Useful Links'); ?></a></h2>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0 clients-wrap">

                <?php $__currentLoopData = $homepageData['usefulllinks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-2 col-md-3 client-logo">
                    <a href="<?php echo e($link->website); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo e(asset('uploads/link/' . $link->logo)); ?>" class="img-fluid" alt="<?php echo e($link->name ?? 'Useful Link'); ?>">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </section><?php /**PATH E:\8122025public_html\public_html\resources\views/frontend/homepage/usefull-links.blade.php ENDPATH**/ ?>