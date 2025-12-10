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
        <h4 class="fw-bold">My Profile</h4>
      </div>

      <div class="card profile-card shadow-sm p-4">
        <div class="profile-header">
          <img src="<?php echo e($userProfile && $userProfile->photo  
        ? asset('uploads/subscriber/profile/'.$userProfile->photo) 
        : 'https://placehold.co/140x140/e0e0e0/000000?text=Profile'); ?>"
            alt="Profile Photo" class="profile-photo">

          <h2><?php echo e($userProfile->first_name . ' ' . $userProfile->last_name); ?></h2>
          <p><?php echo e($userProfile->registration_as ?? 'N/A'); ?></p>
        </div>

        <table class="profile-table w-100">
          <tbody>
            <tr>
              <th scope="row">First Name</th>
              <td><?php echo e($userProfile->first_name ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Last Name</th>
              <td><?php echo e($userProfile->last_name ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td><?php echo e($userProfile->email ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Phone</th>
              <td><?php echo e($userProfile->mobile ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td><?php echo e($userProfile->address ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Date of Birth</th>
              <td><?php echo e(format_date($userProfile->dob)); ?></td>
            </tr>
            <tr>
              <th scope="row">Registration As</th>
              <td><?php echo e($userProfile->registration_as ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <th scope="row">Gender</th>
              <td><?php echo e($userProfile->gender ?? 'N/A'); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>

    <?php echo $__env->make('auth.subscribers.profile._my_account_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.subscribers.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/my_account.blade.php ENDPATH**/ ?>