<?php
info($links);
?>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title"><?php echo e($title); ?></h2>
                <a href="<?php echo e(route('home.index')); ?>">home</a><span> /</span>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($link['url']): ?>
                        <a href="<?php echo e($link['url']); ?>"><?php echo e($link['title']); ?></a>
                    <?php else: ?>
                        <span> <?php echo e($link['title']); ?></span>
                    <?php endif; ?>
                    <?php if(!$loop->last): ?>
                        <span>/</span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/components/areas/breadcrumb.blade.php ENDPATH**/ ?>