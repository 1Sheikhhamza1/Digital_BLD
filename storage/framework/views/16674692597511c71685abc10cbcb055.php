<section id="testimonials" class="testimonials section">

        <section id="testimonials" class="section about">
            <div class="container">
                <h2 class="inner-title"><a href="#"><?php echo e($section['title'] ?? 'Testimonials'); ?></a></h2>
                <div class="row gy-4">
                    <?php $__currentLoopData = $homepageData['feedbacks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                        <div class="testimonial-item">
                            <img src="<?php echo e(asset('uploads/feedback/image/'.$feedback->client_photo)); ?>" class="testimonial-img" alt="<?php echo e($feedback->name ?? 'Client'); ?>">
                            <h3><?php echo e($feedback->client_name ?? ''); ?></h3>
                            <h4><?php echo e($feedback->client_position ?? ''); ?></h4>
                            <div class="stars">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <=$feedback->rating): ?>
                                    <i class="bi bi-star-fill"></i>
                                    <?php else: ?>
                                    <i class="bi bi-star"></i>
                                    <?php endif; ?>
                                    <?php endfor; ?>
                            </div>

                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span><?php echo e(limit_description($feedback->feedback ? strip_tags($feedback->feedback) : '', 150)); ?></span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>


    </section><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/frontend/homepage/testimonials.blade.php ENDPATH**/ ?>