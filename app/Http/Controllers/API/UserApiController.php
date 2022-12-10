<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function v2User()
    {
        $users = User::where('status', 1)->get();
        return response()->json([
            'users'  =>   $users,
        ]);
    } 
}
