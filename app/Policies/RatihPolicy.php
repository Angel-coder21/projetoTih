<?php

namespace App\Policies;

use App\Models\Ratih;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatihPolicy
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
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('viewAnyMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ratih  $ratih
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ratih $ratih)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('viewBase Samu') ) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('viewNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('viewMotorista/Medico')) {
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
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('createNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('createMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ratih  $ratih
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ratih $ratih)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('updateBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('updateNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('updateMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ratih  $ratih
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ratih $ratih)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('deleteNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('deleteMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ratih  $ratih
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ratih $ratih)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('deleteBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('deleteNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('deleteMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ratih  $ratih
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ratih $ratih)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }elseif ($user->hasRole('Base Samu') && $user->hasPermissionTo('destroyBase Samu')) {
            return true;
        }elseif ($user->hasRole('NIR') && $user->hasPermissionTo('destroyNIR')) {
            return true;
        }elseif ($user->hasRole('Motorista/Medico') && $user->hasPermissionTo('destroyMotorista/Medico')) {
            return true;
        }else{
            return false;
        }
    }
}
