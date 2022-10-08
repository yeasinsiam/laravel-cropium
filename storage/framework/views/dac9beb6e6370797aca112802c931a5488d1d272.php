<!DOCTYPE html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(env('APP_NAME')); ?> Admin</title>

    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/vendors/iconfonts/ionicons/dist/css/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('/assets/admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/css/shared/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/admin/css/demo_1/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>" />


</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="<?php echo e(route('admin.dashboard.index')); ?>">
                    <img src="<?php echo e(asset('/assets/images/logo.png')); ?>" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('admin.dashboard.index')); ?>">
                    <img src="<?php echo e(asset('favicon.png')); ?>" alt="logo" /> </a>
                
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                
                
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle"
                                src="<?php echo e(filter_var(auth()->user()->photo, FILTER_VALIDATE_URL)
                                    ? auth()->user()->photo
                                    : asset('/storage/user-photos/') . '/' . auth()->user()->photo); ?>"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle"
                                    src="<?php echo e(filter_var(auth()->user()->photo, FILTER_VALIDATE_URL)
                                        ? auth()->user()->photo
                                        : asset('/storage/user-photos/') . '/' . auth()->user()->photo); ?>"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?php echo e(auth()->user()->name); ?></p>
                                <p class="font-weight-light text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
                            </div>
                            
                            <form action="<?php echo e(route('user.logout')); ?>" onclick="return confirm('Sure logout?')"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="dropdown-item" type="submit">Sign Out<i
                                        class="dropdown-item-icon ti-power-off"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php echo $__env->make('components.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- partial -->
            <div class="main-panel">
                <?php echo $__env->yieldContent('contents'); ?>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            <?php echo e(env('APP_NAME')); ?>

                            2020</span>
                        
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script src="<?php echo e(asset('/assets/admin/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/admin/vendors/js/vendor.bundle.addons.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/admin/js/shared/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/admin/js/shared/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/admin/js/demo_1/dashboard.js')); ?>"></script>
    
</body>

</html>
<?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/layouts/admin.blade.php ENDPATH**/ ?>