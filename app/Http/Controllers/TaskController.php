<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function index(Request $request)#показать список всех задач
    {   #добавлю фильтрацию на все/сделанные/несдел

        $query = Task::query();

        if($request->has('filter')){
            if($request->filter == 'completed'){
                $query->where('is_completed',true);
            }
            elseif($request->filter == 'active'){
                $query->where('is_completed',false);
            }
        }

        $tasks = $query->orderBy('created_at', 'desc')->get();
        #return view('tasks.index', compact('tasks'));
        return response()->json($tasks);
    }

    #добавить read(), который по id Будет читать задачу
    public function read($id){
        $task=Task::find($id);
        if(!$task){
            return response()->json('Task not found');
        }
        #return view('tasks.read', compact('task'));
        return response()->json($task);
    }

    public function create()#показать форму для создания новой задачи
    {
        return view('tasks.create');
        #return response()->json('create');
    }
    public function store(Request $request)#сохранить новую задачу в базу
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        $task = Task::create([
           'title'=> $request->get('title'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('tasks.index');
/*
        return response()->json([
            'message'=>'Task created',
            'task' => $task
        ]);
*/
    }
    public function edit(Task $task)#показать форму для редактирования задачи
    {
        return view('tasks.edit', compact('task'));
        #return response()->json($task);
    }
    public function update(Request $request, Task $task)#сохранить изменение задачи
    {
        $request->validate([
           'title' => 'required|max:255',
           'description' => 'nullable|string',
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index');
/*
        return response()->json([
            'message' => 'Task updated',
            'task' => $task
        ]);
*/
    }
    public function destroy(Task $task)#удалить задачу
    {
        $task->delete();
        return redirect()->route('tasks.index');
/*
         $tasks = Task::all();
        return response()->json([
            'message' => 'Task deleted',
            'tasks' => $tasks
        ]);
*/
    }
    public function toggle(Task $task)#изменить флаг is_completed
    {
        $task->is_completed = !$task->is_completed;
        $task->save();
        return redirect()->route('tasks.index');
/*
         return response()->json([
            'message' => 'status updated',
            'tasks' => $task
        ]);
*/
    }

}
