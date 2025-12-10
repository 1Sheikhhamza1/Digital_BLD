<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Package</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('packages','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('packages','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','packages');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('packages.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Package List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table table-striped table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th width="4%">
                                                <input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" />
                                            </th>
                                            <th>SI</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Price</th>
                                            <th>Currency</th>
                                            <th>Duration Type</th>
                                            <th>Duration (days)</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Highlight Badge</th>
                                            <th>Icon</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($package->id); ?>" class="tablerow">
                                            <td>
                                                <input type="checkbox" name="summe_code[]" id="summe_code<?php echo e($package->id); ?>" value="<?php echo e($package->id); ?>" />
                                            </td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($package->name); ?></td>
                                            <td><?php echo e($package->slug); ?></td>
                                            <td><?php echo e(number_format($package->price, 2)); ?></td>
                                            <td><?php echo e($package->currency ?? '৳'); ?></td>
                                            <td><?php echo e(ucfirst($package->duration_type)); ?></td>
                                            <td><?php echo e($package->duration_in_days); ?></td>
                                            <td>
                                                <?php echo $package->is_featured ? '<span class="badge text-bg-primary">Yes</span>' : '<span class="badge text-bg-secondary">No</span>'; ?>

                                            </td>
                                            <td>
                                                <?php echo $package->status ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <?php if($package->highlight_badge): ?>
                                                <span class="badge text-bg-warning"><?php echo e($package->highlight_badge); ?></span>
                                                <?php else: ?>
                                                <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($package->icon): ?>
                                                <img src="<?php echo e(asset('storage/' . $package->icon)); ?>" alt="Icon" style="width: 30px; height: 30px;">
                                                <?php else: ?>
                                                <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($package->order); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('packages.edit', $package->id)); ?>" title="Edit Record" class="btn btn-warning btn-sm me-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo e(route('packages.show', $package->id)); ?>" title="View Details" class="btn btn-info btn-sm me-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete Record"
                                                    onclick="deleteSingle('<?php echo e($package->id); ?>','masterdelete','packages')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($packages->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/packages/index.blade.php ENDPATH**/ ?>