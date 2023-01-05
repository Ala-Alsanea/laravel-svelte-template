<?php

namespace App\Http\Controllers\auth;


use Inertia\inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    protected function showLogin()
    {
        // dd(auth()->user());

        if (auth()->user()) {

            return back();
        }
        return inertia::render(
            'pages/auth/Login'
        );
        //
    }

    public function login()
    {
        sleep(3);

        // if logged in

        if (auth()->user()) {

            return redirect('/cars');
        }

        // if not logged in
        $user = Request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );


        // dd($name);
        if (auth()->attempt($user)) {

            $name = auth()->user()->name;



            // return redirect()->route('storeUserData', [
            //     'user' => auth()->user()
            // ]);

            return redirect('/cars')
                ->with('alerts', [
                    'success' => true,
                    'msg' => "welcome $name "
                ])
                ->with('user', auth()->user());
        }

        return back()->withErrors(['email' => 'invalid Credentials']);

        //
    }
    protected function logout()
    {
        //
        sleep(3);

        auth()->logout();

        return redirect('/auth/login');
    }
}