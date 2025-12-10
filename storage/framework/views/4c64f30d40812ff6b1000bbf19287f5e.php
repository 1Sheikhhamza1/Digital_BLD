<section id="services" class="services section light-background">
    <div class="container">
        <div class="row gy-4 about">
            <h2 class="inner-title"><a href="#"><?php echo e($section['title'] ?? 'A Preview of Digital BLD'); ?></a></h2>
            <?php $__currentLoopData = $homepageData['legalDecision']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            // Take judgment text
            $judgment = $decision->judgment ?? '';

            // Match Judge's name at start until ":"
            $judgmentFormatted = preg_replace( '/^([^:]+:)/', // everything before first colon
            '<strong>$1</strong>',
            e(limit_description($judgment, 300)) // limit to safe length
            );
            ?>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative p-3 rounded shadow-sm d-flex flex-column h-100">
                    <div class="icon mb-2 text-center">
                        <img src="<?php echo e(asset('frontend/assets/img/book.png')); ?>" alt="Case Icon" class="w-12 h-12">
                    </div>

                    <a href="<?php echo e(route('subscriber.login')); ?>"
                        class="stretched-link text-decoration-none text-dark d-flex flex-column flex-grow-1">

                        <!-- Parties (max 3 lines, bold) -->
                        <div class="clamp-3 mb-2 fw-bold">
                            <?php echo $decision->parties; ?>

                        </div>

                        <!-- Case No (max 1 line, lighter text) -->
                        <div class="text-sm text-gray-500 clamp-1 text-center mb-2">
                            <?php echo $decision->case_no; ?>

                        </div>

                        <!-- Judgment (max 4 lines, fills remaining space) -->
                        <p class="text-sm text-gray-700 clamp-4 flex-grow-1 mb-0 text-justify">
                            <!-- <?php echo $judgmentFormatted; ?> -->
                            <?php echo html_entity_decode($judgmentFormatted, ENT_QUOTES | ENT_HTML5); ?>

                        </p>

                    </a>
                </div>

            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/frontend/homepage/digital-bld.blade.php ENDPATH**/ ?>