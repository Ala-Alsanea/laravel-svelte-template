<?php

namespace App\Http\Controllers\auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function profile($id)
    {

        if (Auth::user()->id != $id) {
            return back();
        }

        $user = User::findOrFail($id);
        dd($user);
    }
}