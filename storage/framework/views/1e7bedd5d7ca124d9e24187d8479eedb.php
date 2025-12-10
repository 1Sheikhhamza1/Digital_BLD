<?php $__env->startSection('title', 'Dictionary'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2">
                        <h3 class="mb-0">Dictionary</h3>
                    </div>
                    <div class="col-sm-5">
                        <form method="GET" action="<?php echo e(route('dictionary.index')); ?>">
                            <div class="row">
                                <div class="col-md-4 p-1">
                                    <input type="text" name="word" value="<?php echo e(request('word')); ?>" class="form-control" placeholder="Word: Type anyting...">
                                </div>
                                <div class="col-md-5 p-1">
                                    <input type="text" name="meaning" value="<?php echo e(request('meaning')); ?>" class="form-control" placeholder="Meaning:  Type anyting...">
                                </div>
                                <div class="col-md-3 p-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                    <a href="<?php echo e(route('dictionary.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('dictionaries','1');" class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('dictionaries','0');" class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','dictionaries');" class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('dictionary.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>


            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dictionary Word List</h3>
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
                                            <th>Word</th>
                                            <th>Meaning</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $dictionary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($service->id); ?>" class="tablerow">
                                            <td><input type="checkbox" name="summe_code[]" value="<?php echo e($service->id); ?>" /></td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo $service->word; ?></td>
                                            <td><?php echo $service->meaning; ?></td>
                                            <td>
                                                <a href="<?php echo e(route('dictionary.edit', $service->id)); ?>" class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteSingle('<?php echo e($service->id); ?>','masterdelete','dictionaries')"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($dictionary->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/dictionary/index.blade.php ENDPATH**/ ?>