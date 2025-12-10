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

    .image-preview {
        margin-top: 5px;
        max-height: 50px;
    }
</style>

<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-3">Configuration -> Footer Control</h3>
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

                <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('configuration.footer.update')); ?>">
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
                                <tbody>

                                    
                                    <tr>
                                        <td width="20%"><label class="form-label">Logo</label></td>
                                        <td>
                                            <input type="file" name="company_logo" class="form-control">
                                            <?php if(!empty($config['company_logo'])): ?>
                                            <img src="<?php echo e(asset('storage/' . $config['company_logo'])); ?>" class="image-preview mt-2" width="100">
                                            <input type="hidden" name="old_company_logo" value="<?php echo e($config['company_logo']); ?>">
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">SSL Image</label></td>
                                        <td>
                                            <input type="file" name="ssl_image" class="form-control">
                                            <?php if(!empty($config['ssl_image'])): ?>
                                            <img src="<?php echo e(asset('storage/' . $config['ssl_image'])); ?>" class="image-preview mt-2" width="100">
                                            <input type="hidden" name="old_ssl_image" value="<?php echo e($config['ssl_image']); ?>">
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">Discover Section</label></td>
                                        <td>
                                            <div class="input-select-group">
                                                <input type="text" name="discover_section" class="form-control mb-2"
                                                    placeholder="Discover Section"
                                                    value="<?php echo e(old('discover_section', $config['discover_section'] ?? '')); ?>">

                                                <select name="discover_menu[]" class="form-control select2Data" multiple="multiple">
                                                    <?php $__currentLoopData = $discoverMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($menu->id); ?>"
                                                        <?php echo e(in_array($menu->id, old('discover_menu', $config['discover_menu'] ?? [])) ? 'selected' : ''); ?>>
                                                        <?php echo e($menu->title); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">Quick Link Section</label></td>
                                        <td>
                                            <div class="input-select-group">
                                                <input type="text" name="quick_link" class="form-control mb-2"
                                                    placeholder="Quick Link Section"
                                                    value="<?php echo e(old('quick_link', $config['quick_link'] ?? '')); ?>">

                                                <select name="quick_link_menu[]" class="form-control select2Data" multiple="multiple">
                                                    <?php $__currentLoopData = $quickMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($menu->id); ?>"
                                                        <?php echo e(in_array($menu->id, old('quick_link_menu', $config['quick_link_menu'] ?? [])) ? 'selected' : ''); ?>>
                                                        <?php echo e($menu->title); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">About Us</label></td>
                                        <td>
                                            <textarea name="about_us" class="form-control" rows="3"><?php echo e(old('about_us', $config['about_us'] ?? '')); ?></textarea>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">Contact Address</label></td>
                                        <td>
                                            <textarea name="contact_address" class="form-control ckeditor" rows="3"><?php echo e(old('contact_address', $config['contact_address'] ?? '')); ?></textarea>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label class="form-label">Copy Right Text</label></td>
                                        <td>
                                            <textarea name="copy_right_text" class="form-control ckeditor" rows="2"><?php echo e(old('copy_right_text', $config['copy_right_text'] ?? '')); ?></textarea>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button class="btn btn-primary btn-lg">Update Footer</button>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/configuration/footer.blade.php ENDPATH**/ ?>