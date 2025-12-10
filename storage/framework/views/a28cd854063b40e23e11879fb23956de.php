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
                <div class="progress-step" data-step="2">
                    <div class="progress-step-number">2</div>
                    <div class="progress-step-label">Verification</div>
                </div>
                <div class="progress-step" data-step="3">
                    <div class="progress-step-number">3</div>
                    <div class="progress-step-label">Password Set</div>
                </div>
                <div class="progress-line">
                    <div class="progress-line-fill" style="width: 0%;"></div>
                </div>
            </div>

            <div class="form-step-content">
                <!-- Form Content (Dynamically switch steps) -->
                <form id="registrationForm" method="POST" action="<?php echo e(route('subscriber.sendOtp')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Step 1: User Information -->
                    <div id="step1Content">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="firstName" class="custom-form-label">First Name <span class="required">*</span></label>
                                <input type="text" class="form-control custom-form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" id="firstName" value="<?php echo e(old('first_name')); ?>">
                                <?php $__errorArgs = ['first_name'];
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

                            <div class="col-md-6">
                                <label for="lastName" class="custom-form-label">Last Name <span class="required">*</span></label>
                                <input type="text" class="form-control custom-form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" id="lastName" value="<?php echo e(old('last_name')); ?>">
                                <?php $__errorArgs = ['last_name'];
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

                            <div class="col-md-6">
                                <label for="dateOfBirth" class="custom-form-label">Date of Birth</label>
                                <div class="input-group">
                                    <input type="text" class="form-control custom-form-control datepicker <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob" id="dateOfBirth" value="<?php echo e(old('dob')); ?>">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                </div>
                                <?php $__errorArgs = ['dob'];
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

                            <div class="col-md-6">
                                <label for="registeredAs" class="custom-form-label">Registered as  <span class="required">*</span></label>
                                <select class="form-select custom-form-select <?php $__errorArgs = ['registration_as'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="registeredAs" name="registration_as">
                                    <option <?php echo e(old('registration_as') == 'Judiciary Person' ? 'selected' : ''); ?> value="Judiciary Person">Judiciary Person</option>
                                    <option <?php echo e(old('registration_as') == 'Lawyer' ? 'selected' : ''); ?> value="Lawyer">Lawyer</option>
                                    <option <?php echo e(old('registration_as') == 'Student' ? 'selected' : ''); ?> value="Student">Student</option>
                                    <option <?php echo e(old('registration_as') == 'Other' ? 'selected' : ''); ?> value="Other">Other</option>
                                </select>
                                <?php $__errorArgs = ['registration_as'];
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

                            <div class="col-md-6">
                                <label for="mobileNumber" class="custom-form-label">Mobile Number <span class="required">*</span></label>

                                <input type="number"
                                    name="mobile"
                                    class="form-control custom-form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    pattern="\d{11,13}"
                                    minlength="11"
                                    maxlength="13"
                                    required
                                    placeholder="Enter 11-digit mobile number"
                                    id="mobileNumber" value="<?php echo e(old('mobile')); ?>">


                                <?php $__errorArgs = ['mobile'];
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

                            <div class="col-md-6">
                                <label for="emailAddress" class="custom-form-label">Email Address <span class="required">*</span></label>
                                <input type="email" class="form-control custom-form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="emailAddress" value="<?php echo e(old('email')); ?>">
                                <?php $__errorArgs = ['email'];
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
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-next">Next</button>
                        </div>
                    </div>

                </form>

                <?php echo $__env->make('auth.subscribers._register-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>

</section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/register.blade.php ENDPATH**/ ?>