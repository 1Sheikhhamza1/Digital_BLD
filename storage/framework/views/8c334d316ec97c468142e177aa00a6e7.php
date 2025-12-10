<section id="hero" class="hero position-relative">
    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        
        <?php $__currentLoopData = $homepageData['banners']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>">
            <img src="<?php echo e(asset('uploads/banners/'.$banner->image)); ?>" alt="">
            <div class="image-overlay"></div>
            <div class="container d-flex align-items-center">
                <div class="row w-100">
                    <div class="<?php if(auth()->guard('subscriber')->check()): ?> col-lg-12 <?php else: ?> col-lg-6 <?php endif; ?> d-flex flex-column justify-content-center">
                        <div class="slider-text" style="<?php if(auth()->guard('subscriber')->check()): ?> max-width:95% <?php endif; ?>">
                            <h2><?php echo e($banner->title); ?></h2>
                            <p><?php echo $banner->description; ?></p>
                            <?php if(!empty($banner->button1_text) && !empty($banner->button1_url)): ?>
                                <a href="<?php echo e($banner->button1_url); ?>" class="btn btn-primary me-2" style="background-color: #003092; border-color: #003092;">
                                    <?php echo e($banner->button1_text); ?>

                                </a>
                            <?php endif; ?>
                            <?php if(!empty($banner->button2_text) && !empty($banner->button2_url)): ?>
                                <a href="<?php echo e($banner->button2_url); ?>" class="btn btn-outline-light">
                                    <?php echo e($banner->button2_text); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev" style="z-index: 100;">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next" style="z-index: 100;">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>

    <?php if(auth()->guard('subscriber')->guest()): ?>
    <div class="login-area position-absolute top-50 end-0 translate-middle-y me-lg-5 me-xl-7 d-none d-sm-none d-md-none d-lg-block" 
         style="width: 350px !important; margin-right: 180px !important; z-index: 10;">
        <?php echo $__env->make('auth.subscribers._login', ['transparent' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <?php endif; ?>
</section>

<?php /**PATH /home/bldlegalized/public_html/resources/views/frontend/homepage/banner.blade.php ENDPATH**/ ?>