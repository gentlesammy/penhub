<?php

namespace App\Policies;

use App\InMessage;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InMessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any in messages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role > 4;
    }

    /**
     * Determine whether the user can view the in message.
     *
     * @param  \App\User  $user
     * @param  \App\InMessage  $inMessage
     * @return mixed
     */
    public function view(User $user, InMessage $inMessage)
    {
      return  $user->id == $inMessage->sent_to_id;
    }

    /**
     * Determine whether the user can create in messages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the in message.
     *
     * @param  \App\User  $user
     * @param  \App\InMessage  $inMessage
     * @return mixed
     */
    public function update(User $user, InMessage $inMessage)
    {
        return  $user->id == $inMessage->sent_to_id;
    }

    /**
     * Determine whether the user can delete the in message.
     *
     * @param  \App\User  $user
     * @param  \App\InMessage  $inMessage
     * @return mixed
     */
    public function delete(User $user, InMessage $inMessage)
    {
        //
    }

    /**
     * Determine whether the user can restore the in message.
     *
     * @param  \App\User  $user
     * @param  \App\InMessage  $inMessage
     * @return mixed
     */
    public function restore(User $user, InMessage $inMessage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the in message.
     *
     * @param  \App\User  $user
     * @param  \App\InMessage  $inMessage
     * @return mixed
     */
    public function forceDelete(User $user, InMessage $inMessage)
    {
        //
    }
}
