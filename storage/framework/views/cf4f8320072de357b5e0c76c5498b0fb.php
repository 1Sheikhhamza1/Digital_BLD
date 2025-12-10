<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>
<style>
                .subscription-table {
                    font-size: 0.85rem;
                    /* Slightly smaller font */
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                }

                .subscription-table thead {
                    background: linear-gradient(90deg, #4facfe, #00f2fe);
                    color: white;
                }

                .subscription-table th,
                .subscription-table td {
                    vertical-align: middle;
                    padding: 8px 12px;
                }

                .status-badge {
                    font-size: 0.75rem;
                    padding: 4px 8px;
                    border-radius: 6px;
                }

                .status-active {
                    background: #d4edda;
                    color: #155724;
                }

                .status-expired {
                    background: #f8d7da;
                    color: #721c24;
                }

                .status-pending {
                    background: #fff3cd;
                    color: #856404;
                }
            </style>

<div class="container mt-5 mb-5">
    <div class="row g-4">
        <!-- Main Content -->
        <main class="col-lg-8">
            <div class="search-summary">
                <h4 class="fw-bold">My Subscription</h4>
            </div>


            

            <div class="table-responsive">
                <table class="table table-hover subscription-table">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i> SI</th>
                            <th><i class="bi bi-box"></i> Package</th>
                            <th><i class="bi bi-calendar"></i> Start Date</th>
                            <th><i class="bi bi-calendar-x"></i> End Date</th>
                            <th><i class="bi bi-cash-stack"></i> Amount</th>
                            <th><i class="bi bi-check-circle"></i> Payment Method</th>
                            <th><i class="bi bi-check-circle"></i> Status</th>
                            <th><i class="bi bi-clock-history"></i> Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($subscription->package->name ?? 'N/A'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($subscription->start_date)->format('d M, Y')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($subscription->expire_date)->format('d M, Y')); ?></td>
                            <td>BDT <?php echo e(number_format($subscription->fee, 2)); ?></td>
                            <td><?php echo e($subscription->payment_method ?? 'N/A'); ?></td>
                            <td>
                                <?php if($subscription->status == 1): ?>
                                <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                <span class="badge bg-secondary">Expired</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($subscription->created_at->format('d M, Y')); ?></td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center">No subscriptions found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <?php echo $__env->make('auth.subscribers.profile._my_account_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/my_subscription.blade.php ENDPATH**/ ?>