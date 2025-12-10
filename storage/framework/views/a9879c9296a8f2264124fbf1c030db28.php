 <?php $__env->startSection('title', 'Dashboard'); ?> <?php $__env->startSection('content'); ?> <div class="app-wrapper"> <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Add New User Manual</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> User Manual List </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-end">
                            <a href="<?php echo e(route('user_manual.index')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> View user_manual List </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-10 offset-1 mt-5">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">user_manual Information</div>
                            </div>
                            <form method="POST" action="<?php echo e(route('user_manual.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 mt-4">
                                            <label for="topic" class="form-label">Topic</label>
                                            <input id="topic" type="text" class="form-control" name="topic" value="<?php echo e(old('topic')); ?>" required>
                                            <?php if($errors->has('topic')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('topic')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <label for="question" class="form-label">Question</label>
                                            <input id="question" type="text" class="form-control" name="question" value="<?php echo e(old('question')); ?>">
                                            <?php if($errors->has('question')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('question')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label for="answer" class="form-label">Answer</label>
                                            <textarea id="answer" name="answer" class="form-control ckeditor" required><?php echo e(old('answer')); ?></textarea>
                                            <?php if($errors->has('answer')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('answer')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <label for="sequence" class="form-label">Sequence</label>
                                            <input id="sequence" type="number" class="form-control" name="sequence" value="<?php echo e(old('sequence')); ?>" style="width:30%">
                                            <?php if($errors->has('sequence')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('sequence')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <label for="status" class="form-label">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="1">Publish</option>
                                                <option value="0">Not Publish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div> <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/user_manual/create.blade.php ENDPATH**/ ?>