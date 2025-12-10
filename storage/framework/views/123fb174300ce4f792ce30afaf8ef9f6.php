<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', Auth::guard('subscriber')->user()->name.' | BLD Profile'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">
    <div class="row g-4">
        <!-- Main Content -->
        <main class="col-lg-8">
            <div class="search-summary">
                <h4 class="fw-bold">Change Password</h4>
            </div>

            <div class="card profile-card shadow-sm p-4">

                <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form action="<?php echo e(route('subscriber.profile.password.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 position-relative">
                        <label for="current_password" class="form-label">Current Password *</label>
                        <input type="password" class="form-control login-password" id="current_password" name="current_password" required>
                        <span class="toggle-password" style="position: absolute; right: 10px; top: 55%; cursor: pointer;">
                            <i class="bi bi-eye"></i>
                        </span>
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="new_password" class="form-label">New Password *</label>
                        <input type="password" class="form-control login-password" id="new_password" name="new_password" required>
                        <span class="toggle-password" style="position: absolute; right: 10px; top: 55%; cursor: pointer;">
                            <i class="bi bi-eye"></i>
                        </span>
                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password *</label>
                        <input type="password" class="form-control login-password" id="new_password_confirmation" name="new_password_confirmation" required>
                        <span class="toggle-password" style="position: absolute; right: 10px; top: 55%; cursor: pointer;">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </main>

        <?php echo $__env->make('auth.subscribers.profile._my_account_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.toggle-password', function() {
            const $password = $(this).siblings('.login-password');
            const $icon = $(this).find('i');

            if ($password.attr('type') === 'password') {
                $password.attr('type', 'text');
                $icon.removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                $password.attr('type', 'password');
                $icon.removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/change_password.blade.php ENDPATH**/ ?>