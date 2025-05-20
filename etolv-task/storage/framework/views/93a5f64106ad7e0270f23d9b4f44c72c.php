<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Management</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"> 
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    nav a {
        margin-right: 10px;
    }

    form {
        display: inline;
    }
    </style>
</head>

<body>

    <nav>
        <a href="<?php echo e(route('schools.index')); ?>">Schools </a>
        <a href="<?php echo e(route('students.index')); ?>">Students </a>
        <a href="<?php echo e(route('subjects.index')); ?>">Subjects </a>
    </nav>

    <hr>

    <?php echo $__env->yieldContent('content'); ?>

</body>

</html><?php /**PATH C:\laragon\www\etolv-task\resources\views/layouts/app.blade.php ENDPATH**/ ?>