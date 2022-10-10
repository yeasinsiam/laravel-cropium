<?php $__env->startSection('title', 'My Profile'); ?>


<?php $__env->startSection('contents'); ?>
    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <?php if(session()->has('success-message')): ?>
                        <div class="alert alert-success"><?php echo e(session('success-message')); ?></div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">My Profile</h3>
                            </div>
                            
                        </div>
                        <hr>
                        <form class="forms-sample" method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="user-name">Name</label>
                                <input type="text" class="form-control" id="user-name" placeholder="Name" name="name"
                                    value="<?php echo e(old('name') ?? $user->name); ?>">
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

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="file-upload-default" id="photo" />
                                <div class="input-group col-xs-12">
                                    <input type="text" id="photo-text" class="form-control file-upload-info"
                                        placeholder="Upload Photo" value="<?php echo e($user->photo); ?>" readonly>
                                    <span class="input-group-append">
                                        <label class="file-upload-browse btn btn-info" for="photo"
                                            style="padding: .5rem 1rem">Upload</label>
                                    </span>
                                </div>
                                <div class="input-group col-xs-12">
                                    <img class="edit-image"
                                        src="<?php echo e(filter_var($user->photo, FILTER_VALIDATE_URL)
                                            ? $user->photo
                                            : asset('/storage/user-photos/') . '/' . $user->photo); ?>"
                                        alt="<?php echo e($user->name); ?>">
                                </div>
                                <?php $__errorArgs = ['photo'];
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

                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="text" class="form-control" id="user-email" placeholder="Email"
                                    name="email" value="<?php echo e(old('email') ?? $user->email); ?>">
                                <?php $__errorArgs = ['email'];
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
                            <div class="form-group">
                                <label for="user-password">Password</label>
                                <input type="password" class="form-control" id="user-password" placeholder="Password"
                                    name="password">
                                <?php $__errorArgs = ['password'];
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

                            <div class="form-group">
                                <label for="user-password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="user-password_confirmation"
                                    placeholder="Confirm Password" name="password_confirmation">
                                <?php $__errorArgs = ['password_confirmation'];
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
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-light">Reset</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/pages/admin/user/profile.blade.php ENDPATH**/ ?>