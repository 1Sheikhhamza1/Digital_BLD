<section id="about" class="how-it-works section about section">
        <div class="container">
            <div class="row position-relative">
                <?php
                $firstChoose = $homepageData['whyChooses']->first();
                $otherChooses = $homepageData['whyChooses']->skip(1);
                ?>

                <div class="col-lg-7">
                    <h2 class="inner-title"><a href="<?php echo e(getPageUrl($firstChoose)); ?>"><?php echo e($section['title'] ?? $firstChoose->title); ?></a></h2>
                    <p><?php echo limit_description($firstChoose->content ? $firstChoose->content : '', 200) ?? ''; ?></p>

                    <div class="col-lg-12 about-img">
                        <?php if($firstChoose->image): ?>
                        <img src="<?php echo e(asset('uploads/pages/image/'.$firstChoose->image)); ?>" style="max-height: 300px;">
                        <?php else: ?>
                        <img src="<?php echo e(asset('frontend/assets/img/about.jpg')); ?>" style="max-height: 300px;">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-5 about-img">
                    <div class="row">
                        <?php $__currentLoopData = $otherChooses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-12">
                            <div class="works-item card-radius <?php echo e($loop->first ? 'active' : ''); ?>">
                                <a href="<?php echo e(getPageUrl($choose)); ?>">
                                    <?php if(!empty($choose->icon)): ?>
                                    <img src="<?php echo e(asset('uploads/pages/icon/'.$choose->icon)); ?>">
                                    <?php else: ?>
                                    <div class="number-circle large <?php echo e($loop->first ? 'disable' : ''); ?>"><i class="fa fa-balance-scale"></i></div>
                                    <?php endif; ?>
                                    <h3 style="min-height: 50px;"><?php echo e($choose->title ?? ''); ?></h3>
                                    <p><?php echo e(limit_description(html_entity_decode($choose->content ? $choose->content : '', ENT_QUOTES | ENT_HTML5), 100)); ?></p>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>

        </div>
    </section><?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/homepage/why-choose.blade.php ENDPATH**/ ?>