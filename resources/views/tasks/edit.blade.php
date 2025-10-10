<!DOCTYPE>
<html>
    <head>
        <title>Edit tasks page</title>
    </head>
    <body>
        <h1>Let's edit your task</h1>

        <form action="{{route('tasks.update',$task)}}" method="post">
            @csrf
            @method('put')

            <label for="title">Text:</label>
            <input type="text" id="title" name="title" value="{{$task->title}}" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <button type="submit">Update</button>
        </form>
        <a href="{{route('tasks.index')}}">Back to list of tasks</a>
    </body>

</html>
