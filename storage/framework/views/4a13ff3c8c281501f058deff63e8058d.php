<?php $__env->startSection('title', 'Subscription Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Subscription Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('subscriptions.index')); ?>" class="btn btn-primary btn-sm">Subscription List</a>
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
                        <h5 class="mb-0">Subscription Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 30%;">Subscriber</th>
                                    <td><?php echo e($subscription->subscriber ? $subscription->subscriber->name : ''); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Subscriber Email</th>
                                    <td><?php echo e($subscription->subscriber ? $subscription->subscriber->email : ''); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Package</th>
                                    <td><?php echo e($subscription->package ? $subscription->package->name : ''); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Subscription Date</th>
                                    <td><?php echo e(\Carbon\Carbon::parse($subscription->subscription_date)->format('d M Y')); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Expire Date</th>
                                    <td><?php echo e(\Carbon\Carbon::parse($subscription->expire_date)->format('d M Y')); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Fee</th>
                                    <td>&#2547;<?php echo e(number_format($subscription->fee, 2)); ?> BDT</td>
                                </tr>
                                <tr>
                                    <th scope="row">Discount</th>
                                    <td>
                                        <?php if(!empty($subscription->discount)): ?>
                                        &#2547;<?php echo e(number_format($subscription->discount, 2)); ?> BDT
                                        <?php else: ?>
                                        0.00 BDT
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Paid</th>
                                    <td>&#2547;<?php echo e(number_format($subscription->total_paid, 2)); ?> BDT</td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment Status</th>
                                    <td>
                                        <?php if($subscription->payment_status == 'paid'): ?>
                                        <span class="badge bg-success">Paid</span>
                                        <?php else: ?>
                                        <span class="badge bg-danger">Unpaid</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment Method</th>
                                    <td><?php echo e(ucfirst($subscription->payment_method ?? 'N/A')); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Transaction ID</th>
                                    <td><?php echo e($subscription->transaction_id ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Created By</th>
                                    <td><?php echo e($subscription->createdBy ? $subscription->createdBy->name : 'System'); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Created At</th>
                                    <td><?php echo e($subscription->created_at ? $subscription->created_at->format('d M Y h:i A') : ''); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Updated At</th>
                                    <td><?php echo e($subscription->updated_at ? $subscription->updated_at->format('d M Y h:i A') : ''); ?></td>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/subscriptions/show.blade.php ENDPATH**/ ?>