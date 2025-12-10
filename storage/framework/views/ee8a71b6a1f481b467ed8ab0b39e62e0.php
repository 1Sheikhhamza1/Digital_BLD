<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2">
                        <h3 class="mb-0">Legal Decision</h3>
                    </div>
                    <div class="col-sm-10">
                        <ol class="breadcrumb float-sm-end">
                            <button type="button" onclick="permissions('ocr_extractions','1','homepage');" style="color:#000; " class="btn btn-success btn-sm m-2  text-white"><i class="fa fa-check"></i> Show in Homepage</button>
                            <button type="button" onclick="permissions('ocr_extractions','0','homepage');" style="color:#000; " class="btn btn-danger btn-sm m-2 text-white"><i class="fa fa-times"></i> Remove form Homepage</button>
                            
                            <button type="button" onclick="permissions('ocr_extractions','1');" style="color:#000; " class="btn btn-success btn-sm m-2"><i class="fa fa-check"></i> Approved</button>
                            <button type="button" onclick="permissions('ocr_extractions','0');" style="color:#000; " class="btn btn-warning btn-sm m-2"><i class="fa fa-times"></i> Disapproved</button>
                            <button type="button" onclick="deletedata('masterdelete','ocr_extractions');" style="color:#fff; " class="btn btn-danger btn-sm m-2"><i class="fa fa-times"></i> Multiple Delete</button>
                            <a href="<?php echo e(route('ocr_extractions.create')); ?>" style="color:#fff; margin-right:20px" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i> Add New (Manual Legal Decision)</a>
                        </ol>
                    </div>
                </div>

                <form method="GET" action="<?php echo e(route('ocr_extractions.index')); ?>" class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-md-2 p-1">
                            <!-- <label>Case No</label> -->
                            <input type="text" name="case_no" value="<?php echo e(request('case_no')); ?>" class="form-control" placeholder="Case No">
                        </div>
                        <div class="col-md-2 p-1">
                            <!-- <label>Parties Name</label> -->
                            <input type="text" name="parties" value="<?php echo e(request('parties')); ?>" class="form-control" placeholder="Parties Name">
                        </div>
                        <div class="col-md-2 p-1">
                        <!-- <label>Division</label> -->
                            <select name="division" class="form-control">
                                <option value="">Select Division</option>
                                <option value="Appellate Division" <?php echo e(request('division') == 'Appellate Division' ? 'selected' : ''); ?>>Appellate Division</option>
                                <option value="High Court Division" <?php echo e(request('division') == 'High Court Division' ? 'selected' : ''); ?>>High Court Division</option>
                                <!-- Add more divisions -->
                            </select>
                        </div>
                        <div class="col-md-2 p-1">
                        <!-- <label>Volume</label> -->
                            <select name="volume_id" class="form-control select2Data">
                                <option value="">Select Volume</option>
                                <?php $__currentLoopData = $volumeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $volumeNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php echo e(request('volume_id') == $id ? 'selected' : ''); ?>>
                                    <?php echo e($volumeNumber); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2 p-1">
                            <!-- <label>Publication Year</label> -->
                            <input type="number" name="published_year" value="<?php echo e(request('published_year')); ?>" class="form-control" placeholder="Published Year">
                        </div>
                        <div class="col-md-2 p-1">
                            <!-- <label>Judge Name</label> -->
                            <input type="text" name="judgename" value="<?php echo e(request('judgename')); ?>" class="form-control" placeholder="Judge Name">
                        </div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <select name="homepage" class="form-control">
                                <option value="">Show in Homepage</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                            <a href="<?php echo e(route('ocr_extractions.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form id="form_check">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th width="4%"><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                            <th>SI</th>
                                            <th>Volume</th>
                                            <th>Case Number</th>
                                            <th>Division</th>
                                            <th>Parties Name</th>
                                            <th>Date of Judgment</th>
                                            <th>Status</th>
                                            <th>Show in Homepage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                        <?php $__currentLoopData = $ocr_extractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ocr_extraction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $i++ ?>
                                        <tr id="tablerow<?php echo $ocr_extraction->id; ?>" class="tablerow">
                                            <td><input type="checkbox" name="summe_code[]" id="summe_code<?php echo $ocr_extraction->id; ?>" value="<?php echo e($ocr_extraction->id); ?>" /></td>
                                            <td><?php echo e($ocr_extractions->firstItem() + $key); ?></td>
                                            <td><?php echo e($ocr_extraction->volume ? $ocr_extraction->volume->number : ''); ?></td>
                                            <td><?php echo e($ocr_extraction->case_no); ?></td>
                                            <td><?php echo e($ocr_extraction->division); ?></td>
                                            <td><?php echo $ocr_extraction->parties; ?></td>
                                            <td><?php echo e($ocr_extraction->decided_on); ?></td>
                                            <td>
                                                <?php echo $ocr_extraction->status ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <?php echo $ocr_extraction->homepage ? '<span class="badge text-bg-success">Yes</span>' : ''; ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('ocr_extractions.edit', $ocr_extraction->id)); ?>" title="Edit Record" class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('ocr_extractions.show', $ocr_extraction->id)); ?>" title="View Details" class="btn btn-info btn-sm me-2"><i class="fa fa-eye"></i></a>
                                                <!-- <button type="button" class="btn btn-danger btn-sm" title="Delete Record"
                                                    onclick="deleteSingle('<?php echo $ocr_extraction->id; ?>','masterdelete','ocr_extractions')"><i class="fa fa-trash"></i></button> -->
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <?php echo e($ocr_extractions->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/ocr_extractions/index.blade.php ENDPATH**/ ?>