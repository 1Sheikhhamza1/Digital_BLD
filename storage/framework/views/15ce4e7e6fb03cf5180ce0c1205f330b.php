<div class="container">
    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <div class="top-action-bar mb-3">
        <div class="row align-items-center w-100 g-2">
            <!-- Left: Back Button -->
            <div class="col-md-1 col-12 text-start mb-2 mb-md-0" style="z-index: 100;">
                <?php if(!$myDecision): ?>
                <a href="<?php echo e(url('subscriber/'.$returnParamString)); ?>" class="action-link">
                    <i class="bi bi-chevron-left"></i> Back
                </a>
                <?php endif; ?>
            </div>

            <!-- Center: Action Buttons -->
            <div class="col-md-9 col-12">
                <div class="text-center d-flex align-items-center justify-content-center">
                    <a href="<?php echo e(route('subscriber.legal-search.print', [$data->id,'print'])); ?>" class="action-link" target="_blank">
                        <i class="bi bi-printer"></i> Print
                    </a>
                    <a href="<?php echo e(route('subscriber.legal-search.print', [$data->id, 'download'])); ?>" class="action-link">
                        <i class="bi bi-download"></i> Download
                    </a>
                    <!-- <a href="<?php echo e(route('subscriber.legal-search.downloadPdf', $data->id)); ?>" class="action-link">
                        <i class="bi bi-download"></i> Download
                    </a> -->
                    <a href="#" class="action-link">
                        <label class="me-1">Translator:</label>
                        <div id="google_translate_element"></div>
                    </a>
                    <?php if(!$myDecision): ?>
                    <a href="#" class="action-link" data-bs-toggle="modal" data-bs-target="#copyModal">
                        <i class="bi bi-folder"></i> Copy to My Folder
                    </a>
                    <?php endif; ?>
                    <?php if($myDecision): ?>
                    <?php if($myNotes && !$sharedDecision): ?>
                    <a href="<?php echo e(route('subscriber.myDecision.editNote', [$myNotes->noteId, $decisionFolderId])); ?>" class="action-link">
                        <i class="bi bi-pencil"></i> Edit My Note
                    </a>
                    <!-- <a href="<?php echo e(route('subscriber.shared.decisions')); ?>" class="action-link">
                            <i class="bi bi-share"></i> Shared with Me
                        </a> -->
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(!$myDecision): ?>
                    <a href="#" class="action-link" id="bookmark-btn" data-id="<?php echo e($data->id); ?>">
                        <?php if($isBookmarked): ?>
                        <i class="bi bi-bookmark-fill text-danger"></i> Bookmarked
                        <?php else: ?>
                        <i class="bi bi-bookmark"></i> Bookmark
                        <?php endif; ?>
                    </a>
                    <span id="bookmark-message" style="margin-left: 10px; color: green; display: none;"></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Previous/Next Navigation -->
            <?php if(!$myDecision): ?>
            <div class="col-md-2 col-12 justify-content-end nav-arrows mt-2 mt-md-0 d-flex justify-content-between">
                <?php if($previousDecision): ?>
                <a href="<?php echo e(route('subscriber.singleDecision', [$previousDecision->id, Crypt::encrypt($returnParamString)])); ?>" class="action-link me-2">
                    <i class="bi bi-chevron-left"></i> Previous
                </a>
                <?php else: ?>
                <a href="#" class="action-link disabled me-2" style="pointer-events: none; opacity: 0.5;">
                    <i class="bi bi-chevron-left"></i> Previous
                </a>
                <?php endif; ?>

                <?php if($nextDecision): ?>
                <a href="<?php echo e(route('subscriber.singleDecision', [$nextDecision->id, Crypt::encrypt($returnParamString)])); ?>" class="action-link">
                    Next <i class="bi bi-chevron-right"></i>
                </a>
                <?php else: ?>
                <a href="#" class="action-link disabled" style="pointer-events: none; opacity: 0.5;">
                    Next <i class="bi bi-chevron-right"></i>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#bookmark-btn').click(function(e) {
            e.preventDefault();

            let $btn = $(this);
            let decisionId = $btn.data('id');
            let $message = $('#bookmark-message');

            $.ajax({
                url: "<?php echo e(route('subscriber.bookmark.toggle')); ?>",
                method: "POST",
                data: {
                    decision_id: decisionId,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    if (res.status === 'added') {
                        $btn.html('<i class="bi bi-bookmark-fill text-danger"></i> Bookmarked');
                        $message.text('Bookmarked!').css('color', 'green').fadeIn();

                    } else {
                        $btn.html('<i class="bi bi-bookmark"></i> Bookmark');
                        $message.text('Bookmark removed!').css('color', 'red').fadeIn();
                    }

                    // Hide message after 3 sec
                    setTimeout(function() {
                        $message.fadeOut();
                    }, 3000);
                }
            });
        });
    });
</script>

<script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn,hi,zh-CN,es,ar', // English, Bangla, Hindi, Chinese (Simplified), Spanish, Arabic
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<?php $__env->stopPush(); ?><?php /**PATH E:\8122025public_html\public_html\resources\views/auth/subscribers/profile/_legal_top_navbar.blade.php ENDPATH**/ ?>