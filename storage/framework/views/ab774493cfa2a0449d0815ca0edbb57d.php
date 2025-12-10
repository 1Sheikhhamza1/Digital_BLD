
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
            <div class="login-box <?php echo e($transparent ? 'transparent-login' : 'solid-login'); ?>" style="max-width: 600px;">
                <?php if($errors->any()): ?>
                <div style="color: red;">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <h4>Verify your email to reset your password</h4>
                <form method="POST" action="<?php echo e(route('subscriber.password.email')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="back" value="<?php echo e(request()->query('back')); ?>">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email address" required>
                    </div>
                    <button type="submit" class="btn-submit">Send Mail</button>

                    <hr>

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/forgot_password/email.blade.php ENDPATH**/ ?>