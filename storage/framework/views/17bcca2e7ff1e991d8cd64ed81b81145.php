<aside class="col-lg-4">
      <div class="sidebar card profile-card shadow-sm p-4">
        <h5 class="mb-3">Quick Links</h5>

        <a href="<?php echo e(route('subscriber.profile')); ?>" class="profile-link-item d-flex align-items-center mb-3 p-3 text-decoration-none text-dark">
          <i class="bi bi-person-circle me-3"></i>
          <span>My Profile</span>
          <i class="bi bi-chevron-right ms-auto"></i>
        </a>

        <a href="<?php echo e(route('subscriber.profile.edit')); ?>" class="profile-link-item d-flex align-items-center mb-3 p-3 text-decoration-none text-dark">
          <i class="bi bi-pencil-square me-3"></i>
          <span>Update Profile</span>
          <i class="bi bi-chevron-right ms-auto"></i>
        </a>

        <a href="<?php echo e(route('subscriber.profile.password.edit')); ?>" class="profile-link-item d-flex align-items-center mb-3 p-3 text-decoration-none text-dark">
          <i class="bi bi-shield-lock me-3"></i>
          <span>Change Password</span>
          <i class="bi bi-chevron-right ms-auto"></i>
        </a>

        <a href="<?php echo e(route('subscriber.mySubscription')); ?>" class="profile-link-item d-flex align-items-center mb-3 p-3 text-decoration-none text-dark">
          <i class="bi bi-card-checklist me-3"></i>
          <span>My Subscription</span>
          <i class="bi bi-chevron-right ms-auto"></i>
        </a>

        <a href="#" class="profile-link-item d-flex align-items-center mb-3 p-3 text-decoration-none text-dark">
          <form method="POST" action="<?php echo e(route('subscriber.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right me-2"></i> <strong>Sign Out</strong>
                </button>
            </form>
        </a>
      </div>
    </aside><?php /**PATH E:\8122025public_html\public_html\resources\views/auth/subscribers/profile/_my_account_nav.blade.php ENDPATH**/ ?>