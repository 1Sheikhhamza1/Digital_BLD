<?php $__env->startSection('title', 'Add New Banner'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Banner Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('banners.index')); ?>" class="btn btn-primary btn-sm">Banner List</a>
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
                        <h5 class="mb-0">Banner Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 30%;">Name</th>
                                    <td><?php echo e($banner->name); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Slug</th>
                                    <td><?php echo e($banner->slug); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td><?php echo nl2br(e($banner->description)); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Price</th>
                                    <td><?php echo e(number_format($banner->price, 2)); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Duration</th>
                                    <td><?php echo e($banner->duration); ?> days</td>
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/banners/show.blade.php ENDPATH**/ ?>