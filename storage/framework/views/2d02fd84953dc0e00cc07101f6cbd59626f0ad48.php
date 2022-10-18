<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle"
                        src="<?php echo e(filter_var(auth()->user()->photo, FILTER_VALIDATE_URL)
                            ? auth()->user()->photo
                            : asset('/storage/user-photos/') . '/' . auth()->user()->photo); ?>"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?php echo e(auth()->user()->name); ?></p>
                    <p class="designation">Premium user</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard.index')); ?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-post" aria-expanded="false" aria-controls="ui-post">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Post</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php if(isset($activeMenu) && in_array('post', $activeMenu)): ?> show <?php endif; ?>" id="ui-post">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', 'App\\Models\Post')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($activeMenu) && in_array('all-post', $activeMenu)): ?> active <?php endif; ?>"
                                href="<?php echo e(route('admin.posts.index')); ?>" id="all-post-menu">All Posts</a>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', 'App\\Models\Post')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($activeMenu) && in_array('create-post', $activeMenu)): ?> active <?php endif; ?>"
                                href="<?php echo e(route('admin.posts.create')); ?>">Add New Post</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View Categories', 'Create And Modify Categories'], 'App\\Models\Category')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($activeMenu) && in_array('categories', $activeMenu)): ?> active <?php endif; ?>" id="category-menu"
                                href="<?php echo e(route('admin.categories.index')); ?>">Category</a>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php if(isset($activeMenu) && in_array('user', $activeMenu)): ?> show <?php endif; ?>" id="ui-users">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', 'App\\Models\User')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($activeMenu) && in_array('all-users', $activeMenu)): ?> active <?php endif; ?>"
                                href="<?php echo e(route('admin.users.index')); ?>" id="all-post-menu">All Users</a>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', 'App\\Models\User')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(isset($activeMenu) && in_array('create-user', $activeMenu)): ?> active <?php endif; ?>"
                                href="<?php echo e(route('admin.users.create')); ?>">Add New User</a>
                        </li>
                    <?php endif; ?>


                    <li class="nav-item">
                        <a class="nav-link <?php if(isset($activeMenu) && in_array('my-profile', $activeMenu)): ?> active <?php endif; ?>"
                            href="<?php echo e(route('admin.user.profile')); ?>">My Profile</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
<?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/components/admin/sidebar.blade.php ENDPATH**/ ?>