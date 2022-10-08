<?php $__env->startSection('title', 'Categories'); ?>


<?php $__env->startSection('contents'); ?>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-5 col-sm-12   grid-margin stretch-card">
                <div class="card">
                    <?php if(session()->has('success-message')): ?>
                        <div class="alert alert-success"><?php echo e(session('success-message')); ?></div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">
                                    <?php if(isset($is_edit_page)): ?>
                                        Edit Category
                                    <?php else: ?>
                                        Create Category
                                    <?php endif; ?>
                                </h3>
                            </div>
                            
                        </div>
                        <hr>
                        <?php if(isset($is_edit_page)): ?>
                            <form class="forms-sample" method="POST"
                                action="<?php echo e(route('admin.categories.update', $category)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group">
                                    <label for="post-title">Name</label>
                                    <input type="text" class="form-control" id="post-title" placeholder="Category Name"
                                        name="name" value="<?php echo e($category->name); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Update</button>
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-light">Reset</a>
                            </form>
                        <?php else: ?>
                            <form class="forms-sample" method="POST" action="<?php echo e(route('admin.categories.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="post-title">Name</label>
                                    <input type="text" class="form-control" id="post-title" placeholder="Category Name"
                                        name="name" value="<?php echo e(old('name')); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Create</button>
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-light">Reset</a>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block"
                                    action="<?php echo e(route('admin.categories.index')); ?>" method="GET">
                                    <input type="search" class="form-control" name="search" placeholder="Search"
                                        value="<?php echo e($search); ?>">
                                </form>
                            </div>
                        </div>
                        <?php if(session()->has('success-message2')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success-message2')); ?>

                            </div>
                        <?php endif; ?>
                        
                        <table class="table table-striped table-sm admin-table">
                            <thead>
                                <tr>
                                    <th> Category ID </th>
                                    <th> Name </th>
                                    <th> Slug</th>
                                    <th> Updated At </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($categories->count() > 0): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><a
                                                    href="<?php echo e(route('admin.categories.edit', $category)); ?>">#<?php echo e($category->id); ?></a>
                                            </td>
                                            <td> <a
                                                    href="<?php echo e(route('admin.categories.edit', $category)); ?>"><?php echo e($category->name); ?></a>
                                            </td>
                                            <td> <?php echo e($category->slug); ?> </td>
                                            <td> <?php echo e(date('M d, Y', strtotime($category->updated_at))); ?> </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>">
                                                    <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                </a>
                                                <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>"
                                                    onclick="return confirm('Sure delete this category?')"
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
                                        <td><span> <?php echo e($search ? 'No search result found' : 'No Post found'); ?> </span> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <style>
                            .admin-table {
                                table-layout: fixed;
                            }

                            .admin-table td {
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
                        </style>
                        
                        <?php echo e($categories->links('components.admin.pagination')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\cropium-lara9\resources\views/pages/admin/category/categories.blade.php ENDPATH**/ ?>