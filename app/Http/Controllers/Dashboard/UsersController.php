<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        if (Auth::user()->hasRole('admin')) {
            $tasks = TaskUser::where('user_id', 2)->get();
            // dd($tasks);
            return view('dashboard.users', [
                'users'     => $users,
                'tasks'     => $tasks,
            ]);
        } else {
            return 'Hi';
        }
    }

    public function add()
    {
        $roles = Role::get();

        return view('dashboard.addUser', [
            'roles'         => $roles,
        ]);
    }

    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'name'              => ['required'],
            'email'             => ['required', 'email'],
            'password'          => ['required'],
            'phone'             => ['required'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(length: 60);

        $user->phone = $request->phone;
        if ($user->save()) {
            $user->attachRole($request->role);
            return redirect()->route('users')->with(['message' => 'The user added successfuly']);
        }
        // return $user;
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $taskUser =TaskUser::findOrFail($id);
        $user->delete();
        $taskUser->delete();
        return redirect()->route('home');
    }
}
