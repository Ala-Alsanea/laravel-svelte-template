<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;




    public function is_admin(User $user, User $model)
    {
        //

        // return true;
        return $user->roles->first()->data == 'admin';
    }

    public function is_author(User $user, User $model)
    {

        return $user->roles->first()->data == 'author';
    }

    public function is_activated(User $user, User $model)
    {
        return $user->activated;
    }

    public function is_same_user(User $user, User $model)
    {
        return $user->id == $model->id;
    }
}