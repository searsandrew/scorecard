<?php

namespace App\Policies;

use App\Boardgame;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardgamePolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Boardgame  $boardgame
     * @return mixed
     */
    public function view(User $user, Boardgame $boardgame)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create boardgames');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Boardgame  $boardgame
     * @return mixed
     */
    public function update(User $user, Boardgame $boardgame)
    {
        if($user->can('edit boardgames') || $user->id === $boardgame->user_id)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Boardgame  $boardgame
     * @return mixed
     */
    public function delete(User $user, Boardgame $boardgame)
    {
        return $user->can('delete boardgames');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Boardgame  $boardgame
     * @return mixed
     */
    public function restore(User $user, Boardgame $boardgame)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Boardgame  $boardgame
     * @return mixed
     */
    public function forceDelete(User $user, Boardgame $boardgame)
    {
        //
    }
}
