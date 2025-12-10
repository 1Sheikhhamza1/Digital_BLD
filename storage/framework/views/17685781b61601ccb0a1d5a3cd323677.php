<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | Legal Terminology Dictionary'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="display-5 text-primary">Legal Terminology</h1>
        <p class="text-muted">Search and explore legal terms with clear explanations.</p>
    </div>

    <!-- Search Bar -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <form method="GET" action="<?php echo e(route('subscriber.dictionary.index')); ?>">
                <div class="input-group shadow-sm rounded">
                    <input type="text" id="dictionarySearch" name="q" class="form-control" placeholder="Search a legal term..." value="<?php echo e($query); ?>">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Word List -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if($words->count() > 0): ?>
                <div class="list-group">
                    <?php $__currentLoopData = $words; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card dictionary-item mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong class="word-title h5" data-original="<?php echo e($word->word); ?>"><?php echo e($word->word); ?></strong>
                                        <p class="meaning-preview text-muted mb-0"
                                           data-full="<?php echo e($word->meaning); ?>"
                                           data-original="<?php echo e($word->meaning); ?>">
                                            <?php echo $word->meaning; ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <?php echo e($words->links('pagination::bootstrap-4')); ?>

                </div>
            <?php else: ?>
                <div class="alert alert-info text-center">No terms found matching your search.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
.dictionary-item {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
}
.dictionary-item:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
.word-title {
    font-size: 1.25rem;
}
.meaning-preview {
    font-size: 1rem;
    line-height: 1.5;
}
.input-group input {
    border-right: 0;
}
.input-group button {
    border-left: 0;
}
.card-body {
    padding: 1rem 1.25rem;
}
mark {
    background-color: #ffe58f;
    color: #000;
    padding: 0 2px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const query = "<?php echo e($query); ?>".trim();
    let keywords = [];
    if(query){
        keywords = query.split(/\s+/).filter(Boolean);
        const regex = new RegExp(`(${keywords.join('|')})`, 'gi');

        // Highlight words and preview meanings
        document.querySelectorAll('.dictionary-item .word-title, .dictionary-item .meaning-preview').forEach(function(el){
            el.innerHTML = el.dataset.original.replace(regex, '<mark>$1</mark>');
        });
    }

    // Expand/Collapse full meaning on click
    document.querySelectorAll('.dictionary-item').forEach(function(card) {
        card.addEventListener('click', function() {
            const meaning = card.querySelector('.meaning-preview');
            if (meaning.classList.contains('expanded')){
                // Collapse
                meaning.textContent = meaning.dataset.preview;
                meaning.classList.remove('expanded');
            } else {
                // Expand
                if (!meaning.dataset.preview) meaning.dataset.preview = meaning.textContent;
                meaning.textContent = meaning.dataset.full;
                meaning.classList.add('expanded');
            }

            // Re-apply highlighting after toggle
            if(keywords.length > 0){
                const regex = new RegExp(`(${keywords.join('|')})`, 'gi');
                meaning.innerHTML = meaning.textContent.replace(regex, '<mark>$1</mark>');
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/dictionary/index.blade.php ENDPATH**/ ?>