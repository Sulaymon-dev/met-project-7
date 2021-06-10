<?php

namespace App\Policies;

use App\Olympic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OlympicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role != 'student';

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Olympic  $olympic
     * @return mixed
     */
    public function view(User $user, Olympic $olympic)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'superadmin', 'teacher']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Olympic  $olympic
     * @return mixed
     */
    public function update(User $user, Olympic $olympic)
    {
        if ($user->role == 'teacher') {
            return $user->id == $olympic->user_id;
        }
        return in_array($user->role, ['admin', 'superadmin', 'moderator']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Olympic  $olympic
     * @return mixed
     */
    public function delete(User $user, Olympic $olympic)
    {
        if ($user->role == 'teacher') {
            return $user->id = $olympic->user_id;
        }
        return in_array($user->role, ['admin', 'superadmin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Olympic  $olympic
     * @return mixed
     */
    public function restore(User $user, Olympic $olympic)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Olympic  $olympic
     * @return mixed
     */
    public function forceDelete(User $user, Olympic $olympic)
    {
        //
    }
}
