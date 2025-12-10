<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Blog</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('blogs','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('blogs','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','blogs');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('blogs.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blog List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($blog->title); ?></td>
                                            <td><?php echo e($blog->author); ?></td>
                                            <td>
                                                <?php if($blog->featured_image): ?>
                                                <img src="<?php echo e(asset('uploads/blogs/' . $blog->featured_image)); ?>"
                                                    alt="<?php echo e($blog->title); ?>"
                                                    style="width: 80px; height: auto; object-fit: cover; border-radius: 4px;">
                                                <?php else: ?>
                                                <em>No image</em>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo $blog->status === 'published'
                                                ? '<span class="badge text-bg-success">Published</span>'
                                                : '<span class="badge text-bg-warning">Draft</span>'; ?>

                                            </td>
                                            <td><?php echo e($blog->created_at->format('d M Y')); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('blogs.edit', $blog->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="btn btn-sm btn-info">View</a>
                                                <form action="<?php echo e(route('blogs.destroy', $blog->id)); ?>" method="POST" class="d-inline">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>



                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($blogs->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/blogs/index.blade.php ENDPATH**/ ?>