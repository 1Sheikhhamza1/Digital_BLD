<?php $__env->startSection('title', 'Decision Details'); ?>
<?php $__env->startSection('content'); ?>

<style>
    
    .document-container {
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        margin-top: 2rem;
        margin-bottom: 2rem;
        max-width: 900px;
        /* Max width for document content */
        margin-left: auto;
        margin-right: auto;
        font-family: 'Inter', sans-serif;
    }

    .document-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .document-header h4 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #343a40;
    }

    .document-header p {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 0;
    }

    .document-section {
        margin-bottom: 1.5rem;
    }

    .document-section h6 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 0.5rem;
    }

    .document-section p,
    .document-section ul {
        xsize: 0.95rem;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .document-section ul {
        list-style: disc;
        padding-left: 1.5rem;
    }

    .document-section ul li {
        margin-bottom: 0.25rem;
    }

    .judgment-heading {
        text-align: center;
        font-size: 1.3rem;
        font-weight: bold;
        margin-top: 2rem;
        margin-bottom: 1.5rem;
        color: #0d6efd;
        display: flex;
        color: black;
        justify-content: center;
    }

    @media (max-width: 767.98px) {
        .top-action-bar {
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }

        .top-action-bar .action-link {
            margin-right: 1rem;
            margin-bottom: 0.75rem;
        }

        .top-action-bar .nav-arrows {
            width: 100%;
            justify-content: space-between;
            display: flex;
            margin-top: 0.5rem;
        }

        .document-container {
            padding: 1.5rem;
        }

        .document-header h4 {
            font-size: 1.2rem;
        }

        .document-section h6 {
            font-size: 1rem;
        }

        .document-section p,
        .document-section ul {
            font-size: 0.9rem;
        }
    }

    .print-download {
        text-align: center;
        margin-top: 20px;
    }

    .print-download a {
        display: inline-block;
        margin: 0 10px;
        padding: 8px 15px;
        background-color: #003092;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
    }

    .judgment p {
        text-align: justify;
        margin-bottom: 1rem;
    }
</style>
<?php
$petitionerEndings = [
    'Plaintiff-Appellants',
    'Defendant Appellants',
    'Plaintiff-Petitioner',
    'Accused Applicant',
    'Accused Petitioner',
    'Condemned Petitioner',
    'Appellants',
    'Appellant',
    'Petitioners',
    'petitioner',
    'State',
    'Defd-Appellant'
];

$respondentEndings = [
    'Plaintiff-Respondents',
    'Defendant Opposite Part',
    'Opposite Parties',
    'Condemned Prisoner',
    'Opposite Party',
    'Respondents',
    'Respondent',
    'the Respondent',
    'State'
];


function getLabel($array, $string)
{
    $found = null;
    foreach ($array as $ending) {
        if (preg_match('/\b' . preg_quote($ending, '/') . '\b\.?/i', $string)) {
            $found = $ending;
            break;
        }
    }

    return $found ? 'For the ' . $found . ':' : null;
}

?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Details Legal Decision</h3>
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
            <div class="container">
                <div class="container mt-5">
                    <div class="container document-container">
                        <div class="document-header text-center">
                            <h4>In the Supreme Court of Bangladesh (<?php echo e($ocrExtraction->division); ?>)</h4>
                            <p><?php echo e($ocrExtraction->case_no ?? ''); ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Published in BLD:</h6>
                            <ul>
                                <li>Volume: <?php echo e($ocrExtraction->volume ? $ocrExtraction->volume->number : ''); ?></li>
                                <li>Year: <?php echo e($ocrExtraction->published_year ?? ''); ?></li>
                                <li>
                                    Page: <?php echo e($ocrExtraction->starting_page_no ?? ''); ?>

                                    <?php if($ocrExtraction->ending_page_no): ?>
                                    to <?php echo e($ocrExtraction->ending_page_no); ?>

                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>

                        <div class="document-section">
                            <h6>Decided On:</h6>
                            <p><?php echo e($ocrExtraction->decided_on ?? ''); ?></p>
                        </div>
                        <div class="document-section">
                            <h6>Result:</h6>
                            <p><?php echo e($ocrExtraction->result ?? ''); ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Parties:</h6>
                            <p><?php echo $ocrExtraction->parties ?? ''; ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Hon'ble Judge(s):</h6>
                            <p><?php echo nl2br(e($ocrExtraction->judge_name ?? '')); ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Counsels:</h6>
                            <h6><?php echo e(getLabel($petitionerEndings, $ocrExtraction->petitioners)); ?></h6>
                            <p><?php echo $ocrExtraction->petitioners ?? ''; ?></p>

                            <h6><?php echo e(getLabel($respondentEndings, $ocrExtraction->respondent)); ?></h6>
                            <p><?php echo $ocrExtraction->respondent ?? ''; ?></p>
                        </div>



                        <div class="document-section">
                            <h6>Subject Matter:</h6>
                            <p><?php echo $ocrExtraction->subject ?? ''; ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Jurisdiction:</h6>
                            <p><?php echo e($ocrExtraction->jurisdiction ?? ''); ?></p>
                        </div>

                        <div class="document-section">
                            <h6>Related Acts/Rules/Orders:</h6>
                            <p><?php echo nl2br(e($ocrExtraction->related_act_order_rule ?? '')); ?> </p>
                        </div>

                        <div class="document-section">
                            <h6>Key words:</h6>
                            <p><?php echo e($ocrExtraction->key_words ?? ''); ?></p>
                        </div>

                        <h5 class="judgment-heading">JUDGMENT</h5>

                        <div class="document-section" style="text-align: justify; white-space: pre-wrap;">
                            <?php echo $judgmentTextFormatted; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/ocr_extractions/show.blade.php ENDPATH**/ ?>