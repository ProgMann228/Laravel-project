<!DOCTYPE>
<html>
    <head>
        <title>Tasks list page</title>
    </head>
    <body>
        <h1>Tasks list</h1>
        <a href="<?php echo e(route('tasks.create')); ?>">Create new task</a>

        <ul>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <p><?php echo e($task->title); ?></p>

            <!--выполнено/невыполнено-->
            <?php if($task->is_completed): ?>
                Completed;
            <?php else: ?>
                Incompleted
            <?php endif; ?>

            <!--редактирование-->
            <a href="<?php echo e(route('tasks.edit',$task)); ?>">Edit task</a>

            <!--удаление-->
            <form action="<?php echo e(route('tasks.destroy',$task)); ?>" method="post" style="display:inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <button type="submit">Delete</button>
            </form>

            <!--изменить выполнено/невыполнено-->
            <form action="<?php echo e(route('tasks.toggle',$task)); ?>" method="post"  style="display:inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <button type="submit">Toggle completion</button>
            </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </body>

</html>
<?php /**PATH C:\Users\lizan\Laravel\my-project\resources\views/tasks/index.blade.php ENDPATH**/ ?>