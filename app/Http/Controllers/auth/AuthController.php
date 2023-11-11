<?php

namespace App\Http\Controllers\auth;


use Inertia\inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Inertia\Response;

class AuthController extends Controller
{
    //
    protected function showLogin()
    {
        // dd(auth()->user());

        if (auth()->check()) {

            return redirect('/admin');
        }

        return inertia::render(
            'pages/auth/Login'
        );
        //
    }

    public function login()
    {

        // if logged in

        // if (auth()->user()->roles->first()->data === 'author') {

        //     return redirect('/cars');
        // }

        // if not logged in
        $user = Request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );


        // dd($name);
        if (auth()->attempt($user)) {

            $name = Auth::user()->name;

            // dd(Auth::user()->activated);

            if (!Auth::user()->activated) {
                Auth::logout();
                return back()->withErrors(['msg' => 'deactivated']);
            }

            // return redirect()->route('storeUserData', [
            //     'user' => auth()->user()
            // ]);

            // if admin user
            if (Auth::user()->roles->first()->data === 'admin') {

                return redirect('/admin/dashboard')
                    ->with('alerts', [
                        'success' => true,
                        'msg' => "welcome $name "
                    ])
                    ->with('user', auth()->user());
            }

            if (Auth::user()->roles->first()->data === 'author') {

                return redirect('/cars')
                    ->with('alerts', [
                        'success' => true,
                        'msg' => "welcome $name "
                    ])
                    ->with('user', auth()->user());
            }
            Auth::logout();
        }

        return back()->withErrors(['msg' => 'invalid Credentials']);

        //
    }
    protected function logout()
    {
        //
        if (auth()->check()) {

            Auth::logout();
            return redirect('auth/login');
        }
        return back();
    }
}
