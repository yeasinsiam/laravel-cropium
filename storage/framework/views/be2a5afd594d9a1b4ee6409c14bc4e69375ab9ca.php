<?php $__env->startSection('title', $category->name); ?>

<?php $__env->startSection('content'); ?>

    <!-- Breadcrumb Area Starts -->
    <?php echo $__env->make('components.areas.breadcrumb', [
        'title' => $category->name,
        'links' => [
            [
                'title' => 'Categories',
                'url' => null,
            ],
            [
                'title' => $category->name,
                'url' => null,
            ],
        ],
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Blog Area Starts -->
    <?php echo $__env->make('components.areas.blog-area', compact('posts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Call To Action Area Starts -->
    <?php echo $__env->make('components.areas.call-to-action-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/pages/category/show.blade.php ENDPATH**/ ?>