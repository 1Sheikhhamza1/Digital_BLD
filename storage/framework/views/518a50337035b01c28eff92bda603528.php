<?php $__env->startSection('title', 'Subscriber Details'); ?>

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
                                    <th scope="row">First Name</th>
                                    <td><?php echo e($subscriber->first_name); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td><?php echo e($subscriber->last_name); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Full Name</th>
                                    <td><?php echo e($subscriber->name); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo e($subscriber->email); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td><?php echo e($subscriber->mobile); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td><?php echo e($subscriber->address); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Registration As</th>
                                    <td><?php echo e($subscriber->registration_as); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td><?php echo e($subscriber->gender); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date of Birth</th>
                                    <td><?php echo e($subscriber->dob); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Photo</th>
                                    <td>
                                    <img src="<?php echo e(isset($subscriber->photo) && $subscriber->photo 
                                ? asset('uploads/subscriber/profile/'.$subscriber->photo) 
                                : 'https://placehold.co/120x120/e0e0e0/000000?text=Profile'); ?>"
                                class="rounded-circle border shadow-sm"  style="width:100px; height:auto"
                                alt="Profile Preview">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td><?php echo e($subscriber->status); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Created At</th>
                                    <td><?php echo e($subscriber->created_at); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Updated At</th>
                                    <td><?php echo e($subscriber->updated_at); ?></td>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/subscribers/show.blade.php ENDPATH**/ ?>