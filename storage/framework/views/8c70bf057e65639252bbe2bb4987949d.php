<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Page</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('pages','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('pages','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','pages');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('pages.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Page List</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="4%"><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                            <th>SI</th>
                                            <th>Title</th>
                                            <th>Parent</th>
                                            <th>Sequence</th>
                                            <th>Page Structure</th>
                                            <th>Connected Page</th>
                                            <th>External URL</th>
                                            <th>Menu Type</th>
                                            <th>Homepage Display</th>
                                            <th>Why Choose</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tablerow<?php echo e($page->id); ?>" class="tablerow">
                                            <td><input type="checkbox" name="summe_code[]" id="summe_code<?php echo e($page->id); ?>" value="<?php echo e($page->id); ?>" /></td>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($page->title); ?></td>
                                            <td><?php echo e($page->parent ? $page->parent->title : '—'); ?></td>
                                            <td><?php echo e($page->sequence); ?></td>
                                            <td><?php echo e($page->page_structure); ?></td>
                                            <td><?php echo e($page->connected_page); ?></td>
                                            <td>
                                                <?php if($page->external_url): ?>
                                                <a href="<?php echo e($page->external_url); ?>" target="_blank"><?php echo e($page->external_url); ?></a>
                                                <?php else: ?>
                                                N/A
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($page->menu_type); ?></td>

                                            <td>
                                                <?php if($page->homepage_display): ?>
                                                <span class="badge text-bg-success">Yes</span>
                                                <?php else: ?>
                                                <span class="badge text-bg-secondary">No</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($page->why_choose): ?>
                                                <span class="badge text-bg-success">Yes</span>
                                                <?php else: ?>
                                                <span class="badge text-bg-secondary">No</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo $page->status ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Page actions">
                                                    <a class="btn btn-outline-success btn-sm edit-sequence-btn"
                                                        data-id="<?php echo e($page->id); ?>"
                                                        data-bs-toggle="tooltip"
                                                        title="Set Sequence"
                                                        data-title="<?php echo e($page->title); ?>"
                                                        data-sequence="<?php echo e($page->sequence); ?>">
                                                        <i class="bi bi-list-nested"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('pages.edit', $page->id)); ?>" class="btn btn-outline-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('pages.show', $page->id)); ?>" class="btn btn-outline-info btn-sm" data-bs-toggle="tooltip" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" title="Delete" onclick="deleteSingle('<?php echo e($page->id); ?>','masterdelete','pages')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($pages->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Sequence Modal -->
    <div class="modal fade" id="editSequenceModal" tabindex="-1" aria-labelledby="editSequenceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSequenceModalLabel">Edit Page Sequence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSequenceForm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="pageTitle" class="form-label">Page Title</label>
                            <input type="text" class="form-control" id="pageTitle" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="newSequence" class="form-label">New Sequence</label>
                            <input type="number" class="form-control" id="newSequence" name="sequence" required>
                        </div>
                        <input type="hidden" id="pageId" name="id">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script>
    $(document).ready(function() {
        // Open modal and populate fields when "Edit" button is clicked
        $(".edit-sequence-btn").on("click", function() {
            var pageId = $(this).data("id");
            var pageTitle = $(this).data("title");
            var currentSequence = $(this).data("sequence");

            // Set modal fields
            $("#pageId").val(pageId);
            $("#pageTitle").val(pageTitle);
            $("#newSequence").val(currentSequence);

            // Show modal
            var myModal = new bootstrap.Modal($("#editSequenceModal"));
            myModal.show();
        });

        // Handle form submission
        $("#editSequenceForm").on("submit", function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "<?php echo e(route('page.updateSequence')); ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    // Close modal
                    var myModal = bootstrap.Modal.getInstance($("#editSequenceModal"));
                    myModal.hide();
                    window.location.reload();
                },
                error: function(xhr) {
                    // Handle error
                    alert("An error occurred while updating the sequence.");
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>