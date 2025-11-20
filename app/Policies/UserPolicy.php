<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function admin(User $user)
    {
        return $user->role === 'admin';
    }

    public function chofer(User $user)
    {
        return $user->role === 'chofer';
    }

    public function dpto(User $user)
    {
        return $user->role === 'dpto';
    }

}
