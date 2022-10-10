<?php $__env->startSection('title', 'All Users'); ?>


<?php $__env->startSection('contents'); ?>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Users</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block" action="<?php echo e(route('admin.users.index')); ?>"
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
                                        <th> User ID </th>
                                        <th> Photo </th>
                                        <th> Name</th>
                                        <th> Email </th>
                                        <th> Created At </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($users->count() > 0): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a
                                                        href="<?php echo e(route('admin.users.edit', $user)); ?>">#<?php echo e($user->id); ?></a>
                                                </td>
                                                <td class="py-1">
                                                    <img class="thumb-image"
                                                        src="<?php echo e(filter_var($user->photo, FILTER_VALIDATE_URL)
                                                            ? $user->photo
                                                            : asset('/storage/user-photos/') . '/' . $user->photo); ?>"
                                                        alt="photo" />
                                                </td>


                                                <td>
                                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>"><?php echo e($user->name); ?></a>

                                                </td>
                                                <td>
                                                    <?php echo e($user->email); ?>

                                                </td>
                                                <td> <?php echo e($user->created_at->format('M d, Y')); ?> </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>">
                                                        <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                                                        onclick="return confirm('Sure delete this user?')"
                                                        class="d-inline m-0 ml-2" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="bg-transparent border-0 outline-0 m-0 text-danger"><i
                                                                class="fa fa-trash" style="font-size:1.4em"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td><span> <?php echo e($search ? 'No search result found' : 'No user found'); ?> </span>
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
                        <?php echo e($users->links('components.admin.pagination')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/pages/admin/user/users.blade.php ENDPATH**/ ?>