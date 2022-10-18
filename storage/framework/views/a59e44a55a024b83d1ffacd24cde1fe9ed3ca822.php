<?php $__env->startSection('title', 'All Posts'); ?>



<?php $__env->startSection('contents'); ?>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Posts</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block" action="<?php echo e(route('admin.posts.index')); ?>"
                                    method="GET">
                                    <input type="search" class="form-control" name="search" placeholder="Search"
                                        value="<?php echo e($search); ?>">
                                </form>
                            </div>
                        </div>
                        <?php if(session()->has('success-message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success-message')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Post ID </th>
                                        <th> Thumbnail </th>
                                        <th> Title</th>
                                        <th> Categories </th>
                                        <th> Author </th>
                                        <th> Total Views </th>
                                        <th> Created At </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($posts->count() > 0): ?>
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a
                                                        href="<?php echo e(route('admin.posts.edit', $post)); ?>">#<?php echo e($post->id); ?></a>
                                                </td>
                                                <td class="py-1">
                                                    <img class="thumb-image"
                                                        src="<?php echo e(filter_var($post->thumbnail, FILTER_VALIDATE_URL)
                                                            ? $post->thumbnail
                                                            : asset('/storage/post-images/') . '/' . $post->thumbnail); ?>"
                                                        alt="Thumbnail" />
                                                </td>
                                                <td> <a
                                                        href="<?php echo e(route('admin.posts.edit', $post)); ?>"><?php echo e($post->title); ?></a>
                                                </td>
                                                <td>
                                                    

                                                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <button
                                                            onclick="window.location.href='<?php echo e(route('admin.categories.edit', $category)); ?>'"
                                                            type="button" class="btn btn-outline-info d-block"
                                                            style="font-size: .8rem; margin-bottom: 3px"><?php echo e($category->name); ?></button>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                    <?php echo e($post->user->name); ?>

                                                </td>
                                                <td> <?php echo e($post->views); ?> </td>
                                                <td> <?php echo e(date('M d, Y', strtotime($post->updated_at))); ?> </td>
                                                <td>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                                        <a href="<?php echo e(route('admin.posts.edit', $post)); ?>">
                                                            <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                        </a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                                        <form action="<?php echo e(route('admin.posts.destroy', $post)); ?>"
                                                            onclick="return confirm('Sure delete this post?')"
                                                            class="d-inline m-0 ml-2" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit"
                                                                class="bg-transparent border-0 outline-0 m-0 text-danger"><i
                                                                    class="fa fa-trash" style="font-size:1.4em"></i></button>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td><span> <?php echo e($search ? 'No search result found' : 'No Post found'); ?> </span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo e($posts->links('components.admin.pagination')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/pages/admin/post/posts.blade.php ENDPATH**/ ?>