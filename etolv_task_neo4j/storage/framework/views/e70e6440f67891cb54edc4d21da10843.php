
<?php $__env->startSection('content'); ?>
<h1>Students</h1>

<a href="<?php echo e(route('students.create')); ?>">Create New Student</a>
<br>
<br>
<a href="<?php echo e(route('students.paginated')); ?>">Test Paginated</a><br>

<div class="mb-3">
    <a href="<?php echo e(route('students.paginated')); ?>" class="btn btn-secondary">View Paginated List</a>
</div>
<br>
<br>
<ul>
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php echo e($student['name']); ?> |

        <a href="<?php echo e(route('students.show', $student['id'])); ?>">View</a>
        <a href="<?php echo e(route('students.edit', $student['id'])); ?>">Edit</a>
        <form action="<?php echo e(route('students.destroy', $student['id'])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit">Delete</button>
        </form>

    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv_task_neo4j\resources\views/students/index.blade.php ENDPATH**/ ?>