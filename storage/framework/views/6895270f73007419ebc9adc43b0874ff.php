<div class="accordion shadow-sm" id="faqAccordion">
    <?php $__currentLoopData = $homepageData['faqs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="heading<?php echo e($index); ?>">
            <button class="accordion-button <?php echo e($index !== 0 ? 'collapsed' : ''); ?> fw-semibold" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($index); ?>"
                aria-expanded="<?php echo e($index === 0 ? 'true' : 'false'); ?>"
                aria-controls="collapse<?php echo e($index); ?>">
                <?php echo e($faq->question); ?>

            </button>
        </h2>
        <div id="collapse<?php echo e($index); ?>" class="accordion-collapse collapse <?php echo e($index === 0 ? 'show' : ''); ?>"
            aria-labelledby="heading<?php echo e($index); ?>" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <?php echo $faq->answer; ?>

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH E:\8122025public_html\public_html\resources\views/frontend/_faq.blade.php ENDPATH**/ ?>