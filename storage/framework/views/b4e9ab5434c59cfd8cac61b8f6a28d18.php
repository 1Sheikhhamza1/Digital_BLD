<?php $__env->startSection('title', 'Add New Service'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Service Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('services.index')); ?>" class="btn btn-primary btn-sm">Service List</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content py-4">
            <div class="container col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Service Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo e($service->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td><?php echo e($service->slug); ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo $service->description; ?></td>
                                </tr>
                                <tr>
                                    <th>Icon</th>
                                    <td><?php echo e($service->icon ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Meta Title</th>
                                    <td><?php echo e($service->meta_title ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Meta Description</th>
                                    <td><?php echo e($service->meta_description ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Meta Keywords</th>
                                    <td><?php echo e($service->meta_keywords ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?php echo e($service->created_at->format('d M Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td><?php echo e($service->updated_at->format('d M Y h:i A')); ?></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php echo $__env->make('admin.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/services/show.blade.php ENDPATH**/ ?>