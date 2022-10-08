<!-- Blog Area Starts -->
<div class="blog-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="cropium-blog-item">
                        <div class="blog-image">


                            <img src="<?php echo e(filter_var($post->thumbnail, FILTER_VALIDATE_URL)
                                ? $post->thumbnail
                                : asset('/storage/post-images/') . '/' . $post->thumbnail); ?>"
                                alt="<?php echo e($post->title); ?>">


                            <div class="blog-date">
                                <h5 class="title"><?php echo e($post->created_at->format('d')); ?></h5>
                                <span><?php echo e($post->created_at->format('M')); ?></span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="<?php echo e(route('users.show', $post->user->slug)); ?>"><i
                                                class="fa fa-user-o"></i><?php echo e($post->user->name); ?></a></li>
                                    <li>
                                        <i class="fa fa-bookmark-o"></i>
                                        <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->last): ?>
                                                <a
                                                    href="<?php echo e(route('categories.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                                            <?php else: ?>
                                                <a
                                                    href="<?php echo e(route('categories.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>,
                                                &nbsp;
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->id); ?>.
                                    <?php echo e($post->title); ?></a>
                            </h3>
                            <p><?php echo e($post->excerpt); ?></p>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Blog Sidebar Starts -->
            <?php echo $__env->make('components.blog.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div>

        <!-- Blog Pagination Starts -->
        <?php echo e($posts->links('components.blog.blog-area-pagination')); ?>





    </div>
</div>
<?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/components/areas/blog-area.blade.php ENDPATH**/ ?>