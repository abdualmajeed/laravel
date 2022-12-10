<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginApiController extends Controller
{
    public function v2Login(Request $request)
    {
       if(auth()->attempt(['email' => $request->input(key:'email'),
       'password' => $request ->input(key:'password')])){
        $user = auth()->user();
        $user->remember_token=Str::random(length: 60);
        $user->save();
        return $user ;
       }
       return "The email or password is not correct";
    }
}
