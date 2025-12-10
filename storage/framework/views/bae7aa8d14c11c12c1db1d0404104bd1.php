<?php $__env->startSection('title', 'Add New Page'); ?>

<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Page Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-primary btn-sm">Page List</a>
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
                        <h5 class="mb-0">Page Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 30%;">Name</th>
                                    <td><?php echo e($page->title); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Slug</th>
                                    <td><?php echo e($page->slug); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Parent Page</th>
                                    <td>
                                        <?php if($page->parent_id && $page->parent): ?>
                                        <?php echo e($page->parent->title); ?>

                                        <?php else: ?>
                                        <em>None</em>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Page Structure</th>
                                    <td><?php echo e($page->page_structure); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">Connected Page</th>
                                    <td><?php echo e($page->connected_page); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">External URL</th>
                                    <td>
                                        <?php if($page->external_url): ?>
                                        <a href="<?php echo e($page->external_url); ?>" target="_blank"><?php echo e($page->external_url); ?></a>
                                        <?php else: ?>
                                        N/A
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Content</th>
                                    <td><?php echo $page->content; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Meta Title</th>
                                    <td><?php echo e($page->meta_title); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Meta Description</th>
                                    <td><?php echo e($page->meta_description); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <?php echo $page->status
                                        ? '<span class="badge text-bg-success">Active</span>'
                                        : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Created At</th>
                                    <td><?php echo e($page->created_at->format('d M Y h:i A')); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Updated At</th>
                                    <td><?php echo e($page->updated_at->format('d M Y h:i A')); ?></td>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/pages/show.blade.php ENDPATH**/ ?>