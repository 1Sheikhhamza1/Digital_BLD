<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-wrapper">
    <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">User</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary btn-sm">User List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="form-container col-sm-8 offset-2">

                <form action="<?php echo e(route('user.update', $user->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="card card-success card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>
                            <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                        </div>
                        <div class="card-body">

                            <div class="input-group mb-3 row">
                                <label for="first_name" class="col-md-3 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>
                                <div class="col-md-8">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e($user->first_name); ?>" required>
                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="last_name" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>
                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e($user->last_name); ?>" required>
                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="user_type" class="col-md-3 col-form-label text-md-right"><?php echo e(__('User Type')); ?></label>
                                <div class="col-md-8">
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="<?php echo e($user->user_type); ?>"><?php echo e($user->user_type); ?></option>
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                    <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="user_type" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Roles')); ?></label>
                                <div class="col-md-8">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <input type="checkbox" name="roles[]" value="<?php echo e($role->name); ?>"
                                            <?php echo e($hasRoles->contains($role->id) ? 'checked' : ''); ?>>
                                        <?php echo e($role->name); ?>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="phone_no" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Phone No')); ?></label>
                                <div class="col-md-8">
                                    <input id="phone_no" type="tel" class="form-control" name="phone_no" value="<?php echo e($user->mobile); ?>" required>
                                    <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <label for="email" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Email')); ?></label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="input-group mb-3 row">
                                <label for="gender" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Gender')); ?></label>
                                <div class="col-md-8">
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Not Declare">Not Declare</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="date_of_birth" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Date of Birth')); ?></label>
                                <div class="col-md-8">
                                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="<?php echo e($user->dob); ?>" required>
                                    <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="input-group mb-3 row">
                                <label for="date_of_birth" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" value="<?php echo e($user->password); ?>" required>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-group mb-3 row">
                                <label for="status" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Status')); ?></label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer"> <button type="submit" class="btn btn-success">Submit</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php echo $__env->make('admin/layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>