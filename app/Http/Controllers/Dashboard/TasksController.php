<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('dashboard.tasks', [
            'tasks' => $tasks,
        ]);
    }

    public function add()
    {
        $users = User::where('status', 1)->get();
        return view('dashboard.addTasks', [
            'users'     => $users
        ]);
    }
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::where('status', 1)->get();
        return view('dashboard.editTasks', [
            'users'     => $users,
            'task'      =>$task,
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $count = count($request->users);
        // dd($count);
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        if ($task->save()) {
            // dd($task->id);
            for ($i = 0; $i < $count; $i++) {
                $taskUser = new TaskUser();
                $taskUser->user_id = $request->users[$i];
                $taskUser->task_id = $task->id;
                $taskUser->task_name = $task->name;
                $taskUser->save();
            }
            return redirect()->route('tasks');
        }

        // exit;
    }
    public function update(Request $request , $id)
    {
        // dd($request);
        $count = count($request->users);
        // dd($count);
        $task =Task::findOrFail($id);
        $task->name = $request->name;
        $task->description = $request->description;
        if ($task->save()) {
            // dd($task->id);
            for ($i = 0; $i < $count; $i++) {
                $taskUser =TaskUser::findOrFail($id);
                $taskUser->user_id = $request->users[$i];
                $taskUser->task_id = $task->id;
                $taskUser->task_name = $task->name;
                $taskUser->save();

            }
            return redirect()->route('tasks');

        }
    }

    public function taskUsers()
    {
        $taskUsers = TaskUser::get();
        return view('dashboard.task-users', [
            'taskUsers'     => $taskUsers,
        ]);
    }
    public function active($id)
    {
        $task = TaskUser::find($id);
        if ($task->status == 0) {
            TaskUser::where('id', $id)->update(['status' => 1]);
        } else {
            TaskUser::where('id', $id)->update(['status' => 0]);
        }
        return redirect()->route('task_users');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $taskUser =TaskUser::findOrFail($id);
        $task->delete();
        $taskUser->delete();
        return redirect()->route('home');
    }
}
