<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Video</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('videos','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('videos','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','videos');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('videos.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Video List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input name="checkbox" onclick="checkedAll();" type="checkbox" readonly="readonly" /></th>
                                            <th>SI</th>
                                            <th>Title</th>
                                            <th>Video</th>
                                            <th>Project</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($video->id); ?>" class="tablerow">
                                            <td><input type="checkbox" name="summe_code[]" id="summe_code<?php echo e($video->id); ?>" value="<?php echo e($video->id); ?>" /></td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($video->title ?? '-'); ?></td>
                                            <td>
                                                <?php if($video->video_url): ?>
                                                <a href="<?php echo e($video->video_url); ?>" target="_blank">Watch Video</a>
                                                <?php else: ?>
                                                -
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($video->project?->title ?? '-'); ?></td>
                                            <td><?php echo $video->status
                                                ? '<span class="badge text-bg-success">Active</span>'
                                                : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('videos.edit', $video->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('videos.show', $video->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteSingle('<?php echo e($video->id); ?>','masterdelete','videos')"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($videos->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/videos/index.blade.php ENDPATH**/ ?>