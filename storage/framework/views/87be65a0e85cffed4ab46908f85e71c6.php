<?php $__env->startSection('title', 'Add New Configuration'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-3">Configuration -> Company Profile</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="form-container col-sm-8 offset-2">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>Success:</strong> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('configuration.company.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Update Company Profile</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" value="<?php echo e(old('company_name', $config->company_name ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $config->email ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $config->phone ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="url" name="website" class="form-control" value="<?php echo e(old('website', $config->website ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">White Label Name</label>
                                <input type="text" name="white_label_name" class="form-control" value="<?php echo e(old('white_label_name', $config->white_label_name ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">White Label URL</label>
                                <input type="url" name="white_label_url" class="form-control" value="<?php echo e(old('white_label_url', $config->white_label_url ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <?php if($config?->logo): ?>
                                <img src="<?php echo e(asset('storage/' . $config->logo)); ?>" height="50">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                                <?php if($config?->favicon): ?>
                                <img src="<?php echo e(asset('storage/' . $config->favicon)); ?>" height="30">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <textarea name="about" class="form-control" rows="4"><?php echo e(old('about', $config->about ?? '')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="<?php echo e(old('meta_title', $config->meta_title ?? '')); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control"><?php echo e(old('meta_description', $config->meta_description ?? '')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" value="<?php echo e(old('meta_keywords', $config->meta_keywords ?? '')); ?>">
                            </div>

                            <button class="btn btn-primary">Update Configuration</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/configuration/company.blade.php ENDPATH**/ ?>