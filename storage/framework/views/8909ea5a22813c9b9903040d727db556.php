<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Client</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('clients','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('clients','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','clients');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('clients.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Client List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th width="4%"><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly /></th>
                                            <th>SI</th>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Testimonial</th>
                                            <th>Website</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($client->id); ?>" class="tablerow">
                                            <td><input type="checkbox" name="summe_code[]" value="<?php echo e($client->id); ?>" /></td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($client->name); ?></td>
                                            <td>
                                                <?php if($client->logo): ?>
                                                <img src="<?php echo e(asset('uploads/link/' . $client->logo)); ?>" alt="Logo" style="max-height: 40px;">
                                                <?php else: ?>
                                                N/A
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(Str::limit($client->testimonial, 50)); ?></td>
                                            <td>
                                                <?php if($client->website): ?>
                                                <a href="<?php echo e($client->website); ?>" target="_blank"><?php echo e($client->website); ?></a>
                                                <?php else: ?>
                                                N/A
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo $client->status ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('clients.show', $client->id)); ?>" class="btn btn-info btn-sm me-2"><i class="fa fa-eye"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteSingle('<?php echo e($client->id); ?>','masterdelete','clients')"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($clients->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/clients/index.blade.php ENDPATH**/ ?>