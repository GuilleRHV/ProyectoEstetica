<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->puesto == "gerente" || $user->puesto == "recepcionista") {
            return true;
        } else {
            return false;
        }

    }


    public function viewSocio(User $user)
    {
        if ($user->puesto == "gerente" || $user->puesto == "recepcionista") {
            return false;
        } else {
            return true;
        }
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Admin $admin)
    {
        if ($user->puesto == "gerente" || $user->puesto == "recepcionista") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->puesto == "gerente" || $user->puesto == "recepcionista") {
            return true;
        } else {
            return false;
        }
    }

    public function createAdmin(User $user)
    {
        if ($user->puesto == "gerente") {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Admin $admin)
    {
        if ($user->puesto == "gerente" || $user->puesto == "recepcionista") {
            return true;
        } else {
            return false;
        }
    }
    //los recepcionistas no pueden modificar admins
    public function updateAdmin(User $user, Admin $admin)
    {
        if ($user->puesto == "gerente") {
            return true;
        } else {
            return false;
        }
    }

 

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Admin $admin)
    {
        if ($user->puesto == "gerente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}
