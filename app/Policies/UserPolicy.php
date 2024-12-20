<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('viewAnyBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('viewAnyNIR')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('viewBase Samu') ) {
            return true;
        }else{
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
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('createBase Samu')) {
            return true;
        }elseif ($user->hasRole('CordenadorNir') && $user->hasPermissionTo('createNIR')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('updateBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('updateNIR')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }elseif ($user->hasRole('CordenadorNir') && $user->hasPermissionTo('deleteNIR')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }elseif ($user->hasRole('CordenadorNir') && $user->hasPermissionTo('deleteNIR')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('destroyBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('destroyNIR')) {
            return true;
        }else{
            return false;
        }
    }
}
