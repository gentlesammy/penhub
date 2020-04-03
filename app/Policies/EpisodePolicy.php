<?php

namespace App\Policies;
use App\Series;
use App\Episode;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EpisodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any episodes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can view the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function view(User $user, Episode $episode)
    {
        //
        return $user->id == $episode->series->user_id;

    }

    /**
     * Determine whether the user can create episodes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function update(User $user, Episode $episode)
    {
        //
        return $user->id === $episode->series->user_id;
    }
     /**
     * Determine whether the user can publish the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function publish(User $user, Episode $episode)
    {
        //
        return $user->id === $episode->series->user_id;
    }

    /**
     * Determine whether the user can delete the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function delete(User $user, Episode $episode)
    {
        //
    }

    /**
     * Determine whether the user can restore the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function restore(User $user, Episode $episode)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the episode.
     *
     * @param  \App\User  $user
     * @param  \App\Episode  $episode
     * @return mixed
     */
    public function forceDelete(User $user, Episode $episode)
    {
        //
    }
}
