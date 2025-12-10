<div class="top-navbar d-flex justify-content-between align-items-center">
    <ul class="nav nav-tabs border-0">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('subscriber.volume.index') ? 'active' : ''); ?>"
               href="<?php echo e(route('subscriber.volume.index', $volumeData->id)); ?>">
               Index
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('subscriber.volume.appellate') ? 'active' : ''); ?>"
               href="<?php echo e(route('subscriber.volume.appellate', $volumeData->id)); ?>">
               Appellate Division
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('subscriber.volume.highcourt') ? 'active' : ''); ?>"
               href="<?php echo e(route('subscriber.volume.highcourt', $volumeData->id)); ?>">
               High Court Division
            </a>
        </li>
    </ul>
    <div class="info-text">
        VOLUME <?php echo e($volumeData->number); ?>

    </div>
</div>
<?php /**PATH /home/bldlegalized/public_html/resources/views/auth/subscribers/profile/volume_nav.blade.php ENDPATH**/ ?>