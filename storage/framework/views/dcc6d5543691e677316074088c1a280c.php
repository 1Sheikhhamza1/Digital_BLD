<?php $__env->startSection('title', 'Subscription List'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Subscription</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('subscriptions','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('subscriptions','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','subscriptions');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('subscriptions.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Subscription List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th width="4%"><input name="checkbox" onclick="checkedAll();" type="checkbox" readonly="readonly" /></th>
                                            <th>SI</th>
                                            <th>Subscriber</th>
                                            <th>Package</th>
                                            <th>Subscription Date</th>
                                            <th>Expiry Date</th>
                                            <th>Subscription Fee</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($subscription->id); ?>" class="tablerow">
                                            <td>
                                                <input type="checkbox" name="summe_code[]" id="summe_code<?php echo e($subscription->id); ?>" value="<?php echo e($subscription->id); ?>" />
                                            </td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($subscription->subscriber?->name ?? ''); ?></td>
                                            <td><?php echo e($subscription->package?->name ?? ''); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($subscription->subscription_date)->format('d M Y')); ?></td>
                                            <td><?php echo e($subscription->expire_date ? \Carbon\Carbon::parse($subscription->expire_date)->format('d M Y') : '-'); ?></td>
                                            <td>&#2547;<?php echo e(number_format($subscription->fee, 2)); ?></td>
                                            <td>
                                                <?php switch($subscription->status):
                                                case (1): ?>
                                                <span class="badge text-bg-success">Active</span>
                                                <?php break; ?>
                                                <?php case (0): ?>
                                                <span class="badge text-bg-danger">Inactive</span>
                                                <?php break; ?>
                                                <?php case (2): ?>
                                                <span class="badge text-bg-warning">Pending</span>
                                                <?php break; ?>
                                                <?php case (3): ?>
                                                <span class="badge text-bg-secondary">Cancelled</span>
                                                <?php break; ?>
                                                <?php default: ?>
                                                <span class="badge text-bg-light text-dark">Unknown</span>
                                                <?php endswitch; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('subscriptions.edit', $subscription->id)); ?>" title="Edit Record" class="btn btn-warning btn-sm me-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo e(route('subscriptions.show', $subscription->id)); ?>" title="View Details" class="btn btn-info btn-sm me-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete Record"
                                                    onclick="deleteSingle('<?php echo e($subscription->id); ?>','masterdelete','subscriptions')">
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
                        <?php echo e($subscriptions->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/subscriptions/index.blade.php ENDPATH**/ ?>