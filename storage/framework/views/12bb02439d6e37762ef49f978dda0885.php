<!DOCTYPE>
<html>
    <head>
        <title>Create tasks page</title>
    </head>
    <body>
        <h1>Let's create your new task</h1>

        <form action="<?php echo e(route('tasks.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <!--в textarea можно впихнуть больше текста
            а в input только 1 строчку-->
            <textarea id="description" name="description"></textarea>

            <button type="submit">Save</button>
        </form>

    <a href="<?php echo e(route('tasks.index')); ?>">Back to list of tasks</a>
    </body>

</html>
<?php /**PATH C:\Users\lizan\Laravel\my-project\resources\views/tasks/create.blade.php ENDPATH**/ ?>