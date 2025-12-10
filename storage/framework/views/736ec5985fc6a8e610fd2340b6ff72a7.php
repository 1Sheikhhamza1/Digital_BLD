<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="<?php echo e(asset('assets/img/admin.jpg')); ?>" class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline"><?php echo e(auth('administration')->user()->name); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <img src="<?php echo e(asset('assets/img/admin.jpg')); ?>" class="rounded-circle shadow" alt="User Image">
                        <p>
                        <?php echo e(auth('administration')->user()->name); ?>

                        <small>Member since <?php echo e(auth('administration')->user()->created_at); ?></small>
                        </p>
                    </li>

                    <li class="user-footer">
                        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                        <form action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-default btn-flat float-end">Sign out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav><?php /**PATH /home/bldlegalized/public_html/resources/views/admin/layouts/topbar.blade.php ENDPATH**/ ?>