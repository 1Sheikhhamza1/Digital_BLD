<?php $__env->startSection('seodetails'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', "Welcome to Digital Bangladesh Legal Decisions"); ?>

<?php $__env->startSection('content'); ?>
<section class="service-sec service-v2-sec service-inner-sec section-padding">
    <div class="container">
        <div class="registration-container">
            <div class="bld-header">
                <div class="logo-text">BLD</div>
                <div class="sub-text">Digital BLD</div>
                <p class="register-steps">Register to BLD platform by following 3 steps</p>
            </div>

            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step active" data-step="1">
                    <div class="progress-step-number">1</div>
                    <div class="progress-step-label">User Information</div>
                </div>
                <div class="progress-step active" data-step="2">
                    <div class="progress-step-number">2</div>
                    <div class="progress-step-label">Verification</div>
                </div>
                <div class="progress-step active" data-step="3">
                    <div class="progress-step-number">3</div>
                    <div class="progress-step-label">Password Set</div>
                </div>
                <div class="progress-line">
                    <div class="progress-line-fill" style="width: 0%;"></div>
                </div>
            </div>

            <div class="form-step-content">
                <form id="registrationForm" method="POST" action="<?php echo e(route('subscriber.completeRegistration')); ?>">
                    <?php echo csrf_field(); ?>
                    <div id="step3Content">
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
                    </div>
                </form>



                <?php echo $__env->make('auth.subscribers._register-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/set-password.blade.php ENDPATH**/ ?>