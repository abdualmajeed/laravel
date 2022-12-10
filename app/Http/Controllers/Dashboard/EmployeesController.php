<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function index()
    {
        $employee = TaskUser::where('status', 1)->where('user_id', Auth::id())->get();
        return view('dashboard.employees' , [
           'employee'   => $employee ,
        ]);
    }
    public function complate($id)
    {
        $task = TaskUser::find($id);
        if ($task->complated == 0) {
            TaskUser::where('id', $id)->update(['complated' => 1]);
        }
        return redirect()->route('employee');
    }
    public function profile(){

        $user = TaskUser::where('status', 1)->where('user_id', Auth::id())->get();
        return view('dashboard.profile' , [
           'user'   => $user ,
        ]);


    }
}
