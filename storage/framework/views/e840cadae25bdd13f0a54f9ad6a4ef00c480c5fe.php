<?php $__env->startComponent('mail::message'); ?>
# Welcome to <?php echo e(config('app.name')); ?>


Visit our site to explore more!

<?php $__env->startComponent('mail::button', ['url' => $site_url]); ?>
    Visit Site
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/emails/notifications/welcome.blade.php ENDPATH**/ ?>