<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>
<?php
$currentYear = date('Y');
$years = range($currentYear, $currentYear - 49); // last 50 years
$months = [
1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
];
?>
<?php $__env->startSection('content'); ?>
<style>
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem; /* text-sm */
            font-weight: 500; /* font-medium */
            color: #4b5563; /* text-gray-600 */
        }
    </style>
<div class="container form-container">
    <form method="POST" action="<?php echo e(route('subscriber.searchResult')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="mb-4 form-group-top">
            <label for="searchKeyword" class="form-label">Write(s)/Sentence(s)</label>
            <input type="text" class="form-control" id="searchKeyword" name="searchKeyword" value="<?php echo e(old('searchKeyword', $inputs['searchKeyword'] ?? '')); ?>">
        </div>

        <!-- First Row -->
        <div class="row g-3 form-group-row">
            <div class="col-md-4 mb-3">
                <label for="selectDivision" class="form-label">Division</label>
                <select class="form-select" id="selectDivision" name="division">
                    <option value="" disabled <?php echo e(empty(old('division', $inputs['division'] ?? '')) ? 'selected' : ''); ?>></option>
                    <option value="Appellate Division" <?php echo e((old('division', $inputs['division'] ?? '') == 'Appellate Division') ? 'selected' : ''); ?>>Appellate Division</option>
                    <option value="High Court Division" <?php echo e((old('division', $inputs['division'] ?? '') == 'High Court Division') ? 'selected' : ''); ?>>High Court Division</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectJurisdiction" class="form-label">Jurisdiction</label>
                <select class="form-select" id="selectJurisdiction" name="jurisdiction">
                    <option value="" disabled <?php echo e(empty(old('jurisdiction', $inputs['jurisdiction'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $getJurisdiction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurisdiction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jurisdiction); ?>" <?php echo e(old('jurisdiction', $inputs['volume_number'] ?? '') == $jurisdiction ? 'selected' : ''); ?>>
                        <?php echo e($jurisdiction); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectFillingYear" class="form-label">Filling Year</label>
                <select class="select2Data form-select" id="selectFillingYear" name="filling_year">
                    <option value="" disabled <?php echo e(empty(old('filling_year', $inputs['filling_year'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $fillingYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($year); ?>" <?php echo e(old('filling_year', $inputs['filling_year'] ?? '') == $year ? 'selected' : ''); ?>>
                        <?php echo e($year); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectJudgmentYear" class="form-label">Year (Judgment)</label>
                <select class="select2Data form-select" id="selectJudgmentYear" name="judgment_year">
                    <option value="" disabled <?php echo e(empty(old('judgment_year', $inputs['judgment_year'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $judgmentYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($year); ?>" <?php echo e(old('judgment_year', $inputs['judgment_year'] ?? '') == $year ? 'selected' : ''); ?>>
                        <?php echo e($year); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectJudgmentMonth" class="form-label">Month (Judgment Month)</label>
                <select class="select2Data form-select" id="selectJudgmentMonth" name="judgment_month">
                    <option value="" <?php echo e(empty(old('judgment_month', $inputs['judgment_month'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($name); ?>" <?php echo e(old('judgment_month', $inputs['judgment_month'] ?? '') == $name ? 'selected' : ''); ?>>
                        <?php echo e($name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectPublicationYear" class="form-label">Year (Publication)</label>
                <select class="select2Data form-select" id="selectPublicationYear" name="published_year">
                    <option value="" disabled <?php echo e(empty(old('published_year', $inputs['published_year'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($year); ?>" <?php echo e(old('published_year', $inputs['published_year'] ?? '') == $year ? 'selected' : ''); ?>>
                        <?php echo e($year); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="writeCaseNumber2" class="form-label">Case number</label>
                <input type="text" class="form-control" id="writeCaseNumber2" name="case_number" value="<?php echo e(old('case_number', $inputs['case_number'] ?? '')); ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="writeVolumeNumber" class="form-label">Volume number</label>
                <select name="volume_number" class="select2Data form-select <?php $__errorArgs = ['volume_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="" disabled <?php echo e(empty(old('volume_number', $inputs['volume_number'] ?? '')) ? 'selected' : ''); ?>></option>
                    <?php $__currentLoopData = $volumeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $volumeName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($id); ?>" <?php echo e(old('volume_number', $inputs['volume_number'] ?? '') == $id ? 'selected' : ''); ?>>
                        <?php echo e($volumeName); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="writePageNumber" class="form-label">Page number</label>
                <input type="text" class="form-control" id="writePageNumber" name="page_number" value="<?php echo e(old('page_number', $inputs['page_number'] ?? '')); ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="writePartiesNames" class="form-label">Parties names</label>
                <input type="text" class="form-control" id="writePartiesNames" name="parties" value="<?php echo e(old('parties', $inputs['parties'] ?? '')); ?>">
            </div>

            
            <div class="col-md-4 mb-3">
                <label for="council" class="form-label">Counsel (Petitioner/Respondent) Name</label>
                <input type="text" class="form-control" id="council" name="council" value="<?php echo e(old('council', $inputs['council'] ?? '')); ?>">
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="writeJudgesNames" class="form-label">Judge/Judge(s) Name</label>
                <input type="text" class="form-control" id="writeJudgesNames" name="judges" value="<?php echo e(old('judges', $inputs['judges'] ?? '')); ?>">
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="act_rule_name" class="form-label">Act/Order/Rule Name</label>
                <input type="text" class="form-control" id="act_rule_name" name="act_rule_name" value="<?php echo e(old('act_rule_name', $inputs['act_rule_name'] ?? '')); ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="selectSectionSubSection" class="form-label">Legislation Status</label>
                <select class="form-select" id="selectSectionSubSection" name="legislation_status">
                <option value="" disabled <?php echo e(empty(old('legislation_status', $inputs['legislation_status'] ?? '')) ? 'selected' : ''); ?>></option>
                    <option <?php echo e((old('legislation_status', $inputs['legislation_status'] ?? '') == 'Active') ? 'selected' : ''); ?>>Active</option>
                    <option <?php echo e((old('legislation_status', $inputs['legislation_status'] ?? '') == 'Amended') ? 'selected' : ''); ?>>Amended</option>
                    <option <?php echo e((old('legislation_status', $inputs['legislation_status'] ?? '') == 'Repealed') ? 'selected' : ''); ?>>Repealed</option>
                </select>
            </div>


            <div class="col-md-4 mb-3">
                <label for="selectSectionSubSection" class="form-label">Section(s) / Sub Section(s)</label>
                <input type="text" class="form-control" id="selectSectionSubSection" name="section_subsection" value="<?php echo e(old('section_subsection', $inputs['section_subsection'] ?? '')); ?>">
            </div>
            
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="<?php echo e(route('subscriber.leagalSearch', ['new' => 1])); ?>" class="btn btn-reset me-4">Reset/Clear</a>
            <button type="submit" class="btn btn-search">Search</button>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/legal_search.blade.php ENDPATH**/ ?>