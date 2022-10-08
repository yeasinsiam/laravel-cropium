<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Area Starts -->
    <?php echo $__env->make('components.areas.breadcrumb', [
        'title' => $post->title,
        'links' => [
            [
                'title' => 'blog',
                'url' => route('blog.index'),
            ],
            [
                'title' => $post->title,
                'url' => null,
            ],
        ],
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Blog Details Area Starts -->
    <?php echo $__env->make('components.areas.blog-details-area', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Call To Action Area Starts -->
    <?php echo $__env->make('components.areas.call-to-action-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/pages/blog/show.blade.php ENDPATH**/ ?>