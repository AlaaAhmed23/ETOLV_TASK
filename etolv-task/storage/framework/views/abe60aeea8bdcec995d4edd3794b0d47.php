
<?php $__env->startSection('content'); ?>
<h1>School Details</h1>

<p><strong>ID:</strong> <?php echo e($school->id); ?></p>
<p><strong>Name:</strong> <?php echo e($school->name); ?></p>
<p><strong>Created at:</strong> <?php echo e($school->created_at); ?></p>
<p><strong>Updated at:</strong> <?php echo e($school->updated_at); ?></p>

<a href="<?php echo e(route('schools.edit', $school->id)); ?>">Edit</a>
<form action="<?php echo e(route('schools.destroy', $school->id)); ?>" method="POST" style="display:inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit">Delete</button>
</form>
<a href="<?php echo e(route('schools.index')); ?>">Back to list</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv-task\resources\views/schools/show.blade.php ENDPATH**/ ?>