<!DOCTYPE>
<html>
    <head>
        <title>Edit tasks page</title>
    </head>
    <body>
        <h1>Let's edit your task</h1>

        <form action="<?php echo e(route('tasks.update',$task)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <label for="title">Text:</label>
            <input type="text" id="title" name="title" value="<?php echo e($task->title); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <button type="submit">Update</button>
        </form>
        <a href="<?php echo e(route('tasks.index')); ?>">Back to list of tasks</a>
    </body>

</html>
<?php /**PATH C:\Users\lizan\Laravel\my-project\resources\views/tasks/edit.blade.php ENDPATH**/ ?>