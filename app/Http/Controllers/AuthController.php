<?php

namespace App\Http\Controllers;

use Inertia\inertia;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    protected function showLogin()
    {
        return inertia::render(
            'pages/auth/Login'
        );
        //
    }

    protected function login()
    {

        $user = Request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );


        // dd($name);
        if (auth()->attempt($user)) {

            $name = auth()->user()->name;

            return redirect('/cars')->with('alerts', [
                'success' => true,
                'msg' => "welcome $name "
            ]);
        }

        return back()->withErrors(['email' => 'invalid Credentials']);

        //
    }
    protected function logout()
    {
        //
        auth()->logout();

        return redirect('/auth/login');
    }
}
