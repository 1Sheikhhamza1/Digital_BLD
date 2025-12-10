<?php $__env->startSection('title', 'Edit Decision'); ?>
<?php $__env->startSection('content'); ?>
<?php
$currentYear = date('Y');
$years = range($currentYear, $currentYear - 49); // last 50 years

$months = [
'January' => 'January',
'February' => 'February',
'March' => 'March',
'April' => 'April',
'May' => 'May',
'June' => 'June',
'July' => 'July',
'August' => 'August',
'September' => 'September',
'October' => 'October',
'November' => 'November',
'December' => 'December'
];

?>

<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Edit Legal Decision</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('ocr_extractions.index')); ?>" class="btn btn-primary btn-sm">Legal Decision List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
        <div class="form-container col-sm-10 offset-1">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <form action="<?php echo e(route('ocr_extractions.update', $ocrExtraction->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Legal Decision</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Division</label>
                                        <select name="division" class="form-select" required>
                                            <option value="<?php echo e($ocrExtraction->division); ?>"><?php echo e($ocrExtraction->division); ?></option>
                                            <option value="Appellate Division">Appellate Division</option>
                                            <option value="High Court Division">High Court Division</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6"><label class="form-label">Volume</label></div>
                                            <div class="col-sm-6 text-right d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="text-primary text-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Volume List
                                                </a>
                                            </div>
                                        </div>
                                        <input type="number" name="volume_id" id="selectedVolume" value="<?php echo e($ocrExtraction->volume ? $ocrExtraction->volume->number : ''); ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-7"><label class="form-label">Volume Index File (PDF Only)</label></div>
                                            <div class="col-sm-5 text-right d-flex justify-content-end">
                                                <?php if(!empty($ocrExtraction->volume->index_file)): ?>

                                                <a href="<?php echo e(asset('uploads/volume/pdfs/' . $ocrExtraction->volume->index_file)); ?>" target="_blank" download>
                                                    Download Index
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <input type="file" name="index_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Published Year</label>
                                        <input type="text" name="published_year" class="form-control" value="<?php echo e(old('published_year', $ocrExtraction->published_year)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Starting Page</label>
                                        <input type="number" name="starting_page_no" class="form-control" value="<?php echo e(old('starting_page_no', $ocrExtraction->starting_page_no)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ending Page</label>
                                        <input type="number" name="ending_page_no" class="form-control" value="<?php echo e(old('ending_page_no', $ocrExtraction->ending_page_no)); ?>">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Case No</label>
                                        <input type="text" name="case_no" class="form-control" value="<?php echo e(old('case_no', $ocrExtraction->case_no)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Judge Name</label>
                                        <input type="text" name="judge_name" class="form-control" value="<?php echo e(old('judge_name', $ocrExtraction->judge_name)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Subject Matter</label>
                                        <textarea  name="subject" class="form-control ckeditor"><?php echo e(old('subject', $ocrExtraction->subject)); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Parties</label>
                                        <textarea  name="parties" class="form-control ckeditor"><?php echo e(old('parties', $ocrExtraction->parties)); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Petitioners</label>
                                        <textarea  name="petitioners" class="form-control ckeditor"><?php echo e(old('petitioners', $ocrExtraction->petitioners)); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Respondent</label>
                                        <textarea  name="respondent" class="form-control ckeditor"><?php echo e(old('respondent', $ocrExtraction->respondent)); ?></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Decided On / Date of Judgment</label>
                                        <input type="text" name="decided_on" class="form-control datepicker" placeholder="The <?php echo e(date('jS F, Y')); ?>" value="<?php echo e(old('decided_on', $ocrExtraction->decided_on)); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Result</label>
                                        <input type="text" name="result" class="form-control" value="<?php echo e(old('result', $ocrExtraction->result)); ?>">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Act/Order/Rule Name</label>
                                        <input type="text" name="related_act_order_rule" class="form-control" value="<?php echo e(old('related_act_order_rule', $ocrExtraction->related_act_order_rule)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sections / Subsections</label>
                                        <input type="text" name="sections_subsections" class="form-control" value="<?php echo e(old('sections_subsections', $ocrExtraction->sections_subsections)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jurisdiction</label>
                                        <input type="text" name="jurisdiction" class="form-control" value="<?php echo e(old('jurisdiction', $ocrExtraction->jurisdiction)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Keywords</label>
                                        <input type="text" name="key_words" class="form-control" value="<?php echo e(old('key_words', $ocrExtraction->key_words)); ?>">
                                    </div>
                                </div>



                                <div class="mb-3 col-12">
                                    <label class="form-label">Judgment</label>
                                    <textarea name="judgment" class="form-control ckeditor"><?php echo e(old('judgment', $ocrExtraction->judgment)); ?></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">📚 Volume List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-2">
                        <?php $__currentLoopData = $volumeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $volumeNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 p-2 volume-card"
                                data-volume="<?php echo e($volumeNumber); ?>" style="cursor: pointer;">
                                <div class="card-body p-2 text-center">
                                    <span class="fw-bold">Volume</span>
                                    <span class="badge bg-primary ms-1"><?php echo e($volumeNumber); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".volume-card").forEach(function(card) {
            card.addEventListener("click", function() {
                let volume = this.getAttribute("data-volume");
                document.getElementById("selectedVolume").value = volume;
                // Close modal after selection
                var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
                modal.hide();
            });
        });
    });
</script>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/ocr_extractions/edit.blade.php ENDPATH**/ ?>