<?php if($paginator->hasPages()): ?>
    <div class="row order-md-1">
        <div class="col-lg-12">
            <div class="cropium-blog-pagination">
                <ul>
                    <?php if(!$paginator->onFirstPage()): ?>
                        <li><a href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="fa fa-angle-left"></i></a></li>
                    <?php endif; ?>

                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_string($element)): ?>
                            <li><span><?php echo e($element); ?></span></li>
                        <?php endif; ?>
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li class="active"><span><?php echo e($page); ?></span></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($paginator->hasMorePages()): ?>
                        <li><a href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="fa fa-angle-right"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/components/blog/blog-area-pagination.blade.php ENDPATH**/ ?>