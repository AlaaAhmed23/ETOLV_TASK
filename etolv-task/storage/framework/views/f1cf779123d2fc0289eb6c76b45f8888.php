

<?php $__env->startSection('content'); ?>
<h1>Student Details</h1>

<p><strong>ID:</strong> <?php echo e($student->id); ?></p>
<p><strong>Name:</strong> <?php echo e($student->name); ?></p>
<p><strong>School:</strong> <?php echo e($student->school->name); ?></p>
<p><strong>Subjects:</strong>
<ul>
    <?php $__currentLoopData = $student->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($subject->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</p>

<a href="<?php echo e(route('students.edit', $student->id)); ?>">Edit</a>
<form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" style="display:inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit">Delete</button>
</form>
<a href="<?php echo e(route('students.index')); ?>">Back</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv-task\resources\views/students/show.blade.php ENDPATH**/ ?>