<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Permissions</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <a href="javascript:void()" onclick="permissions('permissions','1');" class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</a>
                            <a href="javascript:void()" onclick="permissions('permissions','0');" class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</a>
                            <a href="javascript:void()" onclick="deletedata('masterdelete','permissions');" class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</a>
                            <a href="<?php echo e(route('permission.create')); ?>" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New Permission</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permission List</h3>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                                <?php endif; ?>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Module</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($permission->module->name ?? '-'); ?></td>
                                            <td><?php echo e($permission->name); ?></td>
                                            <td><?php echo e($permission->slug); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="<?php echo e(route('permission.destroy', $permission->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No permissions found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>