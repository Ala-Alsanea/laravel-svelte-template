<?php

namespace App\Http\Controllers\auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    //


    public function profile($id)
    {

        Gate::authorize('is_activated', Auth::user());
        $user = User::findOrFail($id);
        Gate::authorize('is_same_user', [Auth::user(), $user]);

        dd($user);
    }

    public function getAllUsersToAdmin(Request $request)
    {
        // $user = User::select('name', 'email',);

        Gate::authorize('is_admin', Auth::user());
        Gate::authorize('is_activated', Auth::user());

        $per_page = $request->per_page != null ? $request->per_page : 10;
        $user = User::with('roles')->paginate($per_page);


        // dd($user->first());

        return Inertia::render('pages/admin/user/Index', [
            'user' => $user
        ]);
    }


    public function adminActivateUser($id)
    {

        Gate::authorize('is_admin', Auth::user());
        Gate::authorize('is_activated', Auth::user());


        if ($id !== Auth::user()->id) {
            $user = User::findOrFail($id);
            $user->update(['activated' => !(bool)request()->state]);

            return back();
            // dd();
        }
    }

    public function getAdminRegisterUser(Request $request)
    {

        Gate::authorize('is_admin', Auth::user());
        Gate::authorize('is_activated', Auth::user());

        $roles = Role::select('data')->get();
        // dd($roles[0]->data);

        return Inertia::render('pages/admin/user/CreateUser', [
            'roles' => $roles
        ]);
    }

    public function adminRegisterUser(Request $request)
    {

        Gate::authorize('is_admin', Auth::user());
        Gate::authorize('is_activated', Auth::user());
        //
        // dd($request);
        $user = $request->validate([
            'name' => 'required|min:3|alpha',
            'email' => 'required|email',
            'role' => Rule::exists("roles", "data")
        ]);

        $user['password'] = Hash::make('123');
        $role = Role::where('data', '=', $user['role'])->first();
        unset($user['role']);
        $userModel = $role->users()->create($user);
        // dd($userModel);

        return redirect('admin/user')->with(
            [
                'alerts' => [
                    'success' => true,
                    'msg' => "user registered "
                ]
            ]
        );
    }
}
