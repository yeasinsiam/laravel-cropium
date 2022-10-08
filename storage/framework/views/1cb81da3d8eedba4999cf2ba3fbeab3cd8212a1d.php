<?php $__env->startSection('title', 'Dashbord'); ?>

<?php $__env->startSection('contents'); ?>
    <div class="content-wrapper">
        <h1>Welcome to <a href="<?php echo e(route('home.index')); ?>" target="_blank"><?php echo e(env('APP_NAME')); ?> </a> Admin Panel </h1>
    </div>
    


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/pages/admin/dashbord.blade.php ENDPATH**/ ?>