

<?php $__env->startSection('content'); ?>
<h1>Edit Student</h1>

<form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo e($student->name); ?>" required>
    </div>

    <div>
        <label for="school_id">School:</label>
        <select name="school_id" required>
            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($school->id); ?>" <?php echo e($school->id == $student->school_id ? 'selected' : ''); ?>>
                <?php echo e($school->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="subject_ids">Subjects:</label>
        <select name="subject_ids[]" multiple>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($subject->id); ?>" <?php echo e($student->subjects->contains($subject->id) ? 'selected' : ''); ?>>
                <?php echo e($subject->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <button type="submit">Update</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\etolv-task\resources\views/students/edit.blade.php ENDPATH**/ ?>