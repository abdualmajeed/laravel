<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        // return view('admin.login');
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('dashboard.login');
    }

    public function login(Request $request)
    {
        Validator::validate($request->all(), [
            'admin_email' => ['required', 'email', 'exists:users,email'],
            'admin_password' => ['required'],
        ]);
        $user = User::where('email', '=', $request->admin_email)->first();
        if (!Hash::check($request->admin_password, $user->password)) {
            return redirect()->route('login')->with(['password' => false, 'password' => 'اوبس! كلمة السر غير صحيحة']);
        }

        if (Auth::attempt(['email' => $request->admin_email, 'password' => $request->admin_password])) {
            if (Auth::user()->hasRole('admin'))
                return redirect()->route('home');
            else
                return redirect()->route('employee');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }

    public function checkRole()
    {
        if (Auth::user()->hasRole('admin'))
            return 'home';
        else
            return 'employee';
    }
}
