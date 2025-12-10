
<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>
<?php $__env->startSection('content'); ?>

<?php
$transparent = $transparent ?? false;
?>
<section class="service-sec service-v2-sec service-inner-sec section-padding gray-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-box <?php echo e($transparent ? 'transparent-login' : 'solid-login'); ?>" style="max-width: 750px;">
                <h4>Reset Your Password</h4>
                <form method="POST" action="<?php echo e(url('subscriber/reset-password')); ?>"> <?php echo csrf_field(); ?>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                    </div> -->


                    <div class="row g-3 mb-4">
                            <div class="col-md-7">
                                <div class="col-sm-12 mb-4">
                                    <div class="password-input-group">
                                        <input type="password" class="form-control custom-form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="New password" required>
                                        <button type="button" class="password-toggle" id="togglePassword">
                                            <i class="bi bi-eye-slash"></i>
                                        </button>
                                    </div>
                                    <?php $__errorArgs = ['password'];
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
                                <div class="col-sm-12">
                                    <div class="password-input-group">
                                        <input type="password" class="form-control custom-form-control <?php $__errorArgs = ['password_confirm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" id="confirmPassword" placeholder="Confirm new password" required>
                                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                            <i class="bi bi-eye-slash"></i>
                                        </button>
                                    </div>
                                    <?php $__errorArgs = ['password_confirm'];
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
                            </div>

                            <div class="col-md-5">
                                <ul class="password-rules-list" id="passwordRules">
                                    <li id="ruleLength"><i class="bi bi-exclamation-circle-fill"></i> Must be at least 8 characters long</li>
                                    <li id="ruleLowercase"><i class="bi bi-exclamation-circle-fill"></i> Must contain a lowercase letter</li>
                                    <li id="ruleCapital"><i class="bi bi-exclamation-circle-fill"></i> Must contain a capital letter</li>
                                    <li id="ruleNumber"><i class="bi bi-exclamation-circle-fill"></i> Must contain a number</li>
                                    <li id="ruleSpecial"><i class="bi bi-exclamation-circle-fill"></i> Must contain a special Character</li>
                                </ul>
                            </div>
                        </div>

                    <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-next">Submit</button>
                        </div>
                    <div class="text-link">
                        <span style="color: black;">Remembered your password? </span>
                        <a href="<?php echo e(route('subscriber.login')); ?>">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        password.type = password.type === 'password' ? 'text' : 'password';
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const confirmPassword = document.getElementById('confirmPassword');
        confirmPassword.type = confirmPassword.type === 'password' ? 'text' : 'password';
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });

    const passwordInput = document.getElementById('password');
    const rulesList = document.getElementById('passwordRules');
    const ruleLength = document.getElementById('ruleLength');
    const ruleLowercase = document.getElementById('ruleLowercase');
    const ruleCapital = document.getElementById('ruleCapital');
    const ruleSpecial = document.getElementById('ruleSpecial');

    passwordInput.addEventListener('input', function() {
        rulesList.classList.remove('d-none');

        const val = passwordInput.value;

        ruleLength.classList.toggle('text-success', val.length >= 8); // Minimum 8 characters
        ruleLowercase.classList.toggle('text-success', /[a-z]/.test(val)); // At least one lowercase
        ruleCapital.classList.toggle('text-success', /[A-Z]/.test(val)); // At least one uppercase
        ruleNumber.classList.toggle('text-success', /[0-9]/.test(val)); // At least one number
        ruleSpecial.classList.toggle('text-success', /[!@#$%^&*(),.?":{}|<>]/.test(val)); // At least one special char

    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/forgot_password/reset.blade.php ENDPATH**/ ?>