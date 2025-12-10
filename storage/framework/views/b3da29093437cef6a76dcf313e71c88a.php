<?php echo $__env->make('admin.layouts.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-link">
            <img src="<?php echo e(asset('frontend/assets/img/logo.png')); ?>" alt="Digital Bangladesh Legal Decisions Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">BLD</span> </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">FUNCTIONAL</li>
                <?php if(hasAnyPermissionOnResource('configuration')): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-gear"></i>
                            <p>Configuration <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('configuration.company')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('configuration.company')); ?>" class="nav-link">
                                    <i class="nav-icon bi bi-list"></i>
                                    <p>Company Profile</p>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('configuration.homepage')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('configuration.homepage')); ?>" class="nav-link">
                                    <i class="nav-icon bi bi-plus-circle"></i>
                                    <p>Homepage Section</p>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('configuration.footer')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('configuration.footer')); ?>" class="nav-link">
                                    <i class="nav-icon bi bi-plus-circle"></i>
                                    <p>Footer Section</p>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('dictionary')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi-list-check"></i>
                        <p>Dictionary Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dictionary.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('dictionary.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Dictionary List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dictionary.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('dictionary.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Dictionary</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                <?php if(hasAnyPermissionOnResource('pages')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi-file-earmark"></i>
                        <p>Pages <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Page List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('pages.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Page</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(hasAnyPermissionOnResource('user_manual')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi-file-earmark"></i>
                        <p>User Manual <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_manual.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user_manual.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>User Manual List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_manual.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user_manual.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Manual</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(hasAnyPermissionOnResource('faq')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi-file-earmark"></i>
                        <p>FAQ <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('faq.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>FAQ List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('faq.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New FAQ</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('banners')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-sliders"></i>
                        <p>Banner <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banners.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('banners.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Banner List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banners.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('banners.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Banner</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('subscribers')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Subscriber <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribers.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('subscribers.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Subscriber List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribers.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('subscribers.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Subscriber</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('subscriptions')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash-stack"></i>
                        <p>Subscription Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscriptions.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('subscriptions.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Subscription List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscriptions.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('subscriptions.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Subscription</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('package_features')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes"></i>
                        <p>Package Features <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package_features.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_features.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Feature List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package_features.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_features.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Feature</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(hasAnyPermissionOnResource('package_feature_modules')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes"></i>
                        <p>Package Feature Modules <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package_feature_modules.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_feature_modules.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Module List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package_feature_modules.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_feature_modules.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Module</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(hasAnyPermissionOnResource('packages')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes"></i>
                        <p>Package/Plan Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packages.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('packages.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Package List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packages.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('packages.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Package</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('volumes')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-journals"></i>
                        <p>Volume <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('volumes.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('volumes.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Volume List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('volumes.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('volumes.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Volume</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('ocr_extractions')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-journal-text"></i>
                        <p>Legal Decision <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ocr_extractions.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('ocr_extractions.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Decision List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ocr_extractions.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('ocr_extractions.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Decision</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('blogs')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>Blog Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('blogs.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Blog List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('blogs.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Blog</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('services')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi-list-check"></i>
                        <p>Service Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('services.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('services.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Service List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('services.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('services.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Service</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('clients')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Usefull Link Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('clients.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Link List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('clients.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Link</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('client_feedbacks')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Client Feedback Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_feedbacks.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('client_feedbacks.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Client Feedback List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_feedbacks.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('client_feedbacks.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Client Feedback</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('careers')): ?>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-file"></i>
                        <p>Career Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('careers.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('careers.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Career List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('careers.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('careers.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Career</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li> -->
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('inquiries')): ?>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-question-lg"></i>
                        <p>Inquiry Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inquiries.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('inquiries.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Inquiry List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inquiries.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('inquiries.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Inquiry</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li> -->
                <?php endif; ?>

                
                <?php if(hasAnyPermissionOnResource('teams')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Team Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teams.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('teams.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Team List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teams.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('teams.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Team</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('photos')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-image"></i>
                        <p>Photo Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('photos.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('photos.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Photo List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('photos.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('photos.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Photo</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                
                <?php if(hasAnyPermissionOnResource('videos')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-camera-reels"></i>
                        <p>Video Manage <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('videos.view')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('videos.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Video List</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('videos.create')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('videos.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Video</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>



                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
                <li class="nav-header"><i class="bi bi-gear-wide-connected"></i> SETTINGS</li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-plus-fill"></i>
                        <p>User<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('user.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New User</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item"> <a href="#" class="nav-link">

                        <i class="nav-icon bi bi-person-fill-lock"></i>
                        <p>Role<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('roles.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('roles.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Role</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-database-fill-lock"></i>
                        <p>Permission<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('permission.index')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Permission List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('permission.create')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>New Permission</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-key"></i>
                        <p>Assign Permission<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('roles.permissions.assign')); ?>" class="nav-link">
                                <i class="nav-icon bi bi-list"></i>
                                <p>Assign Permission to Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside><?php /**PATH /Users/sheikhhamza/Desktop/Anti Gravatity/bldlegalized_bld/bldlegalized_bld/8122025public_html/public_html/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>