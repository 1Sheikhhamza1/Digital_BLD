<?php $__env->startSection('title', 'Add New Configuration'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .input-select-group {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .input-select-group input,
    .input-select-group select {
        flex: 1;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 25px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 19px;
        width: 19px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #28a745;
    }

    input:checked+.slider:before {
        transform: translateX(24px);
    }
</style>

<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-3">Configuration -> Homepage Section Control</h3>
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
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Success:</strong> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('configuration.homepage.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Update Company Profile</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Title</th>
                                        <th>Position</th>
                                        <th>Display</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sections = [
                                    'banner' => 'Banner Section',
                                    'welcome' => 'Welcome Section',
                                    'why-choose' => 'Why Choose',
                                    'digital-bld' => 'A Preview of Digital BLD',
                                    'how-to-works' => 'How BLD Works?',
                                    'testimonials' => 'Testimonials',
                                    'packages' => 'Our Packages',
                                    'photo-gallery' => 'Photo gallery',
                                    'usefull-links' => 'Useful Links',
                                    'faq' => 'FAQ',
                                    'blog' => 'Latest Blog',
                                    ];
                                    ?>

                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $section = $homepageSections[$key] ?? null;
                                    ?>
                                    <tr>
                                        <td><strong><?php echo e($label); ?></strong></td>

                                        
                                        <td>
                                            <input type="text" name="sections[<?php echo e($key); ?>][title]" class="form-control"
                                                placeholder="Enter section title"
                                                value="<?php echo e(old("sections.$key.title", $section['title'] ?? $label)); ?>">
                                        </td>

                                        
                                        <td>
                                            <input type="number" name="sections[<?php echo e($key); ?>][position]" class="form-control"
                                                placeholder="Position (1, 2, 3...)"
                                                value="<?php echo e(old("sections.$key.position", $section['position'] ?? 0)); ?>">
                                        </td>

                                        
                                        <td class="text-center">
                                            <label class="switch">
                                                <input type="checkbox" name="sections[<?php echo e($key); ?>][display]" value="1"
                                                    <?php echo e(old("sections.$key.display", $section['display'] ?? 1) ? 'checked' : ''); ?>>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <button class="btn btn-primary btn-lg">Update Homepage Sections</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/configuration/homepage.blade.php ENDPATH**/ ?>