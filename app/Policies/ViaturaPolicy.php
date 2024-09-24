<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Viatura;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViaturaPolicy
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
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Viatura  $viatura
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Viatura $viatura)
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
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Viatura  $viatura
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Viatura $viatura)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('updateBase Samu')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Viatura  $viatura
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Viatura $viatura)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Viatura  $viatura
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Viatura $viatura)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Viatura  $viatura
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Viatura $viatura)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('destroyBase Samu')) {
            return true;
        }else{
            return false;
        }
    }
}
