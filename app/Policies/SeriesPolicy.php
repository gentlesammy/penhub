<?php

namespace App\Policies;

use App\Series;
use App\User;
use App\profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeriesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any series.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the series.
     *
     * @param  \App\User  $user
     * @param  \App\Series  $series
     * @return mixed
     */
    public function view(User $user, Series $series)
    {
        return $user->id == $series->user_id;
    }

    /**
     * Determine whether the user can create series.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Profile $profile)
    {
        //
        $user->id == $profile->user_id  &&
        $user->series->count() < 1;
    }

    /**
     * Determine whether the user can update the series.
     *
     * @param  \App\User  $user
     * @param  \App\Series  $series
     * @return mixed
     */
    public function update(User $user, Series $series)
    {
        //checking if userid is the same as series owner id
       return $user->id === $series->user_id;

    }

    /**
     * Determine whether the user can delete the series.
     *
     * @param  \App\User  $user
     * @param  \App\Series  $series
     * @return mixed
     */
    public function delete(User $user, Series $series)
    {
        //
    }

    /**
     * Determine whether the user can restore the series.
     *
     * @param  \App\User  $user
     * @param  \App\Series  $series
     * @return mixed
     */
    public function restore(User $user, Series $series)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the series.
     *
     * @param  \App\User  $user
     * @param  \App\Series  $series
     * @return mixed
     */
    public function forceDelete(User $user, Series $series)
    {
        //
    }
}
