    
    <?php $__env->startSection('title', 'Dashboard'); ?>
    <?php $__env->startSection('content'); ?>
    <div class="app-wrapper">
        <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">

                    
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-primary shadow-sm"><i class="bi bi-people-fill"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Subscriber</span>
                                    <span class="info-box-number"><?php echo e($subscriberCount); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-danger shadow-sm"><i class="bi bi-cash-stack"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Payment</span>
                                    <span class="info-box-number"><?php echo e(number_format($totalPayments, 2)); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm"><i class="bi bi-boxes"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Packages</span>
                                    <span class="info-box-number"><?php echo e($packageCount); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-warning shadow-sm"><i class="bi bi-journals"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Volume</span>
                                    <span class="info-box-number"><?php echo e($volumeCount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-secondary shadow-sm"><i class="bi bi-journal-text"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Legal Decisions</span>
                                    <span class="info-box-number"><?php echo e($legalDecisionCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-secondary shadow-sm"><i class="bi bi-journal-text"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Appellate Division</span>
                                    <span class="info-box-number"><?php echo e($appellateDivisionCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-secondary shadow-sm"><i class="bi bi-journal-text"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">High Court Division</span>
                                    <span class="info-box-number"><?php echo e($highCourtDivisionCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-info shadow-sm"><i class="bi bi-card-checklist"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Subscription</span>
                                    <span class="info-box-number"><?php echo e($subscriptionCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-dark shadow-sm"><i class="bi bi-gear-fill"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Service</span>
                                    <span class="info-box-number"><?php echo e($serviceCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-muted shadow-sm"><i class="bi bi-people"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Team Member</span>
                                    <span class="info-box-number"><?php echo e($teamMemberCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- New Card: Client Feedback -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm"><i class="bi bi-chat-dots"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Client Feedback</span>
                                    <span class="info-box-number"><?php echo e($clientFeedbackCount); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- New Card: Users -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-primary shadow-sm"><i class="bi bi-people-fill"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number"><?php echo e($userCount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>



                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Monthly Subscription Report</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyReportChart" width="600" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Subscriber</h3>
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
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>SI</th>
                                                    <th>Subscriber Name</th>
                                                    <th>Subscriber Contact</th>
                                                    <th>Subscription Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($subscriber->name); ?></td>
                                                    <td><?php echo e($subscriber->mobile); ?></td>
                                                    <td><?php echo e($subscriber->created_at->format('d M, Y')); ?></td>
                                                    <td><span class="badge text-bg-success">Active</span></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <a href="<?php echo e(route('subscribers.index')); ?>" class="btn btn-sm btn-secondary float-end">View All Subscriber</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Subscriptions</h3>
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
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>SI</th>
                                                    <th>Subscriber Name</th>
                                                    <th>Subscription Fee</th>
                                                    <th>Subscription Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $latestSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($subscription->subscriber->name ?? 'N/A'); ?></td>
                                                    <td><?php echo e(number_format($subscription->fee, 2)); ?></td>
                                                    <td><?php echo e($subscription->created_at->format('d M, Y')); ?></td>
                                                    <td><span class="badge text-bg-success">Active</span></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($latestSubscriptions->isEmpty()): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">No subscriptions found.</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <a href="<?php echo e(route('subscriptions.index')); ?>" class="btn btn-sm btn-secondary float-end">View All Subscriptions</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </main>
        <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php $__env->stopSection(); ?>



    <?php $__env->startSection('page-script'); ?>
    <script>
        const ctx = document.getElementById('monthlyReportChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($months, 15, 512) ?>,
                datasets: [{
                        label: 'Monthly Subscriptions',
                        data: <?php echo json_encode($subscriberTotals, 15, 512) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Monthly Payments',
                        data: <?php echo json_encode($paymentTotals, 15, 512) ?>,
                        backgroundColor: 'rgba(0, 192, 50, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString(); // Format with commas
                            }
                        }
                    }
                }
            }
        });
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>