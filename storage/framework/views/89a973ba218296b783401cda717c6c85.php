<?php
$transparent = $transparent ?? false;
?>

<div class="login-box <?php echo e($transparent ? 'transparent-login' : 'solid-login'); ?>">
  <?php if($errors->any()): ?>
  <div style="color: red;">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>
  <h4>Login to Your Account</h4>
  <form method="POST" action="<?php echo e(url('subscriber/login')); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="back" value="<?php echo e(request()->query('back')); ?>">

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="Email address" required>
    </div>
    <div class="form-group" style="position: relative;">
      <input type="password" class="form-control login-password" name="password" placeholder="Password" required>
      <span class="toggle-password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
        <i class="fa fa-eye"></i>
      </span>
    </div>

    <button type="submit" class="btn-submit">Login</button>

    <div class="text-link">
      <a href="<?php echo e(route('subscriber.password.request')); ?>">Forgot password?</a>
    </div>

    <hr>

    <div class="text-link">
      <span style="color: black;">Don't have an account?</span>
      <a href="<?php echo e(url('subscriber/register')); ?>">Sign Up</a>
    </div>
  </form>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function() {
    $(document).on('click', '.toggle-password', function() {
      const $password = $(this).siblings('.login-password');
      const $icon = $(this).find('i');

      if ($password.attr('type') === 'password') {
        $password.attr('type', 'text');
        $icon.removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        $password.attr('type', 'password');
        $icon.removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/auth/subscribers/_login.blade.php ENDPATH**/ ?>