

<?php $__env->startSection('content'); ?>
<h1>Subject Details</h1>

<p><strong>ID:</strong> <?php echo e($subject->id); ?></p>
<p><strong>Name:</strong> <?php echo e($subject->name); ?></p>
<p><strong>Students:</strong>
<ul>
    <?php $__currentLoopData = $subject->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($student->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</p>

<a href="<?php echo e(route('subjects.edit', $subject->id)); ?>">Edit</a>
<form action="<?php echo e(route('subjects.destroy', $subject->id)); ?>" method="POST" style="display:inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit">Delete</button>
</form>
<a href="<?php echo e(route('subjects.index')); ?>">Back</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv-task\resources\views/subjects/show.blade.php ENDPATH**/ ?>