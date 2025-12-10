<ul class="custom-menu d-flex flex-wrap gap-4 m-0 me-4 list-unstyled">
    <li>
        <a href="<?php echo e(route('subscriber.dashboard')); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.dashboard' ? 'active' : ''); ?>">
           Home
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('subscriber.leagalSearch',['new' => 1])); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.leagalSearch' ? 'active' : ''); ?>">
           Legal Search
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('subscriber.dictionary.index')); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.dictionary.index' ? 'active' : ''); ?>">
           Legal Terminology
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('subscriber.bldVolume')); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.bldVolume' ? 'active' : ''); ?>">
           BLD Volume
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('subscriber.myFolder')); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.myFolder' ? 'active' : ''); ?>">
           My Folder
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('subscriber.bookmark')); ?>"
           class="text-white text-decoration-none <?php echo e(Route::currentRouteName() === 'subscriber.bookmark' ? 'active' : ''); ?>">
           Bookmarks
        </a>
    </li>
</ul>
<?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/auth/subscribers/layouts/_nav.blade.php ENDPATH**/ ?>