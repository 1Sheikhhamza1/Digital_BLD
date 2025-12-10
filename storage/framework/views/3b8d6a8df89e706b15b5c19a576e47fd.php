<?php $__env->startSection('title', 'Add New Blog'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Blog Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('projects.index')); ?>" class="btn btn-primary btn-sm">Blog List</a>
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
                        <h5 class="mb-0">Blog Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th style="width: 25%;">Title</th>
                                    <td><?php echo e($blog->title); ?></td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td><?php echo e($blog->slug); ?></td>
                                </tr>
                                <tr>
                                    <th>Author</th>
                                    <td><?php echo e($blog->author ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td><?php echo $blog->content; ?></td>
                                </tr>
                                <tr>
                                    <th>Featured Image</th>
                                    <td>
                                        <?php if($blog->featured_image): ?>
                                        <img src="<?php echo e(asset('storage/' . $blog->featured_image)); ?>" alt="Featured Image" style="max-height: 150px;">
                                        <?php else: ?>
                                        <em>No image uploaded</em>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php echo $blog->status === 'published'
                                        ? '<span class="badge text-bg-success">Published</span>'
                                        : '<span class="badge text-bg-warning">Draft</span>'; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Meta Title</th>
                                    <td><?php echo e($blog->meta_title ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Meta Description</th>
                                    <td><?php echo e($blog->meta_description ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Meta Keywords</th>
                                    <td><?php echo e($blog->meta_keywords ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?php echo e($blog->created_at->format('d M Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td><?php echo e($blog->updated_at->format('d M Y h:i A')); ?></td>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/blogs/show.blade.php ENDPATH**/ ?>