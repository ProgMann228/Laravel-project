<!DOCTYPE>
<html>
    <head>
        <title>Tasks list page</title>
    </head>
    <body>
        <h1>Tasks list</h1>
        <a href="{{route('tasks.create')}}">Create new task</a>

        <ul>
        @foreach($tasks as $task)
            <li>
            <p>{{$task->title}}</p>

            <!--выполнено/невыполнено-->
            @if($task->is_completed)
                Completed;
            @else
                Incompleted
            @endif

            <!--редактирование-->
            <a href="{{route('tasks.edit',$task)}}">Edit task</a>

            <!--удаление-->
            <form action="{{route('tasks.destroy',$task)}}" method="post" style="display:inline">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>

            <!--изменить выполнено/невыполнено-->
            <form action="{{route('tasks.toggle',$task)}}" method="post"  style="display:inline">
                @csrf
                @method('patch')
                <button type="submit">Toggle completion</button>
            </form>
            </li>
        @endforeach
        </ul>
    </body>

</html>
