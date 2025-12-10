    <div class="container comment-container">
        <?php if(!empty($decisionComment)): ?>
        <div id="comments" class="mb-4">
            <?php $__currentLoopData = $decisionComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex mb-3 p-3 border rounded shadow-sm bg-white comment-item" data-id="<?php echo e($comment->id); ?>">
                <img src="<?php echo e($comment->user->photo ? asset('uploads/subscriber/profile/'.$comment->user->photo) : asset('assets/img/avater-user.webp')); ?>"
                    alt="<?php echo e($comment->user ? $comment->user->name : ''); ?>"
                    class="rounded-circle me-3" width="50" height="50">

                <div>
                    <div class="d-flex align-items-center mb-1">
                        <h6 class="mb-0 me-2"><?php echo e($comment->user ? $comment->user->name : ''); ?></h6>
                        <small class="text-muted"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                        <?php if(auth('subscriber')->id() === $comment->user_id): ?>
                        <button class="btn btn-sm btn-link text-primary ms-5 edit-comment-btn" title="Edit your comment">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-link text-danger delete-comment-btn" title="Delete this comment">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                        <?php endif; ?>
                    </div>
                    <p class="mb-0 comment-text"><?php echo e($comment->comment); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-4">
            <!-- Left side: Add Comment -->
            <button type="button" class="book-now-btn" data-bs-toggle="modal" data-bs-target="#commentModal">
                <i class="bi bi-chat"></i> Add Comment
            </button>

            <!-- Right side: Share -->
            <button type="button" class="book-now-btn" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="bi bi-share"></i> Share
            </button>
        </div>



        <!-- Add Coment Modal -->
        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="commentForm" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea id="commentText" class="form-control" rows="4" placeholder="Write your comment here..." required></textarea>
                        <input type="hidden" id="decisionId" value="<?php echo e($data->id); ?>">
                        <input type="hidden" id="requesrtId" value="<?php echo e($myNotes->id); ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="disable-btn mr-20 text-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="book-now-btn">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Edit Comment Modal -->
        <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editCommentForm" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea id="editCommentText" class="form-control" rows="4" required></textarea>
                        <input type="hidden" id="editCommentId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="disable-btn mr-20 text-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="book-now-btn">Update Comment</button>


                    </div>
                </form>
            </div>
        </div>


        <!-- Share Decision Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="shareForm" method="POST" action="<?php echo e(route('subscriber.decision.share')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel">Share Decision</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <label for="receiverUser" class="form-label">Select user to share with</label>
                            <div class="col-sm-12">
                                <select id="receiverUser" name="receiver_id" class="form-select mb-3 select2Data" required>
                                    <option value="">-- Select user --</option>
                                    <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> [ <?php echo e($user->email); ?> ] </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="decision_id" id="shareDecisionId" value="<?php echo e($data->id); ?>">
                                <input type="hidden" name="reqeust_id" id="shareRequestId" value="<?php echo e($myNotes->id); ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Share</button>
                        </div>
                    </form>

                    
                    <div class="p-3 border-top">
                        <?php if($getAllSharedUser->isNotEmpty()): ?>
                        <h6 class="mb-3">Already Shared With:</h6>
                        <ul class="list-group">
                            <?php $__currentLoopData = $getAllSharedUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shared): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?php echo e($shared->receiver->name); ?></strong><br>
                                    <small class="text-muted"><?php echo e($shared->receiver->email); ?></small>
                                </div>
                                <form action="<?php echo e(route('subscriber.decision.share.revoke', $shared->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to revoke sharing for this user?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Revoke</button>
                                </form>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php else: ?>
                        <div class="text-muted">Not shared with anyone yet.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


    </div><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/_decision_comments.blade.php ENDPATH**/ ?>