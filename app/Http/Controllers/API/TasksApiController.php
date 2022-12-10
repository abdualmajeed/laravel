<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksApiController extends Controller
{
    public function v2Task()
    {
        $tasks = Task::where('status', 1)->get();
        return response()->json([
            'tasks'  =>   $tasks,
        ]);
    }
}
