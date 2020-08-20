<?php

namespace App\Policies;

use App\Store;
use Illuminate\Auth\Access\HandlesAuthorization;
use Tuandm\Laravue\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function view(User $user, Store $store)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function update(User $user, Store $store)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function delete(User $user, Store $store)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function restore(User $user, Store $store)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Tuandm\Laravue\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function forceDelete(User $user, Store $store)
    {
        //
    }
}
