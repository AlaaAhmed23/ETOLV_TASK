

<?php $__env->startSection('content'); ?>
<h1>Create School</h1>
<form method="POST" action="<?php echo e(route('schools.store')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" placeholder="School Name">
    <button type="submit">Create</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv-task\resources\views/schools/create.blade.php ENDPATH**/ ?>