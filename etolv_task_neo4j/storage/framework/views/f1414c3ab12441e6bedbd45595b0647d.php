

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Student Details</h1>

    <p><strong>Name:</strong> <?php echo e($student['name']); ?></p>
    <p><strong>School:</strong> <?php echo e($student['school']['name'] ?? 'N/A'); ?></p>

    <p><strong>Subjects:</strong></p>
    <?php if(!empty($student['subjects'])): ?>
    <ul>
        <?php $__currentLoopData = $student['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($subject['name']); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php else: ?>
    <p>No subjects enrolled.</p>
    <?php endif; ?>

    <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary">Back to Students</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv_task_neo4j\resources\views/students/show.blade.php ENDPATH**/ ?>