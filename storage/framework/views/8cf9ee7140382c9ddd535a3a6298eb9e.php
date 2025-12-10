<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Roles</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>" class="btn btn-primary btn-sm">View Role List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="form-container col-sm-8 offset-2">
            
                <form method="POST" action="<?php echo e(route('roles.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Roles List</h3>
                            <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                        </div>
                        <div class="card-body">

                            <div class="input-group mb-3 row">
                                <label for="name" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Roles Name')); ?></label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red;"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="input-group mb-3 row">
                                <label for="name" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Status')); ?></label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control">
                                        <option value="1">Display</option>
                                        <option value="0">Not Display</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"> <button type="submit" class="btn btn-success">Submit</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/roles/create.blade.php ENDPATH**/ ?>