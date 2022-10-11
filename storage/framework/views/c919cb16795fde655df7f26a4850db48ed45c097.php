<h1> Customer Name: <i><u><?php echo e(auth('customer')->user()->name); ?></u></i> </h1>


<form action="<?php echo e(route('customer.logout')); ?>" class="d-inline" method="POST">
    <?php echo csrf_field(); ?>
    <button type="submit" class="template-btn header-btn">Log Out</button>
</form>
<?php /**PATH C:\Programs\Laravel\softtechit\laravel-cropium\resources\views/pages/customer/index.blade.php ENDPATH**/ ?>