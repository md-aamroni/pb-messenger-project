<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
{
    /**
     * Determine whether the user can view any models
     * @param  User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model
     * @param  User    $user
     * @param  Message $message
     * @return bool
     */
    public function view(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models
     * @param  User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model
     * @param  User    $user
     * @param  Message $message
     * @return bool
     */
    public function update(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model
     * @param  User    $user
     * @param  Message $message
     * @return bool
     */
    public function delete(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model
     * @param  User    $user
     * @param  Message $message
     * @return bool
     */
    public function restore(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model
     * @param  User    $user
     * @param  Message $message
     * @return bool
     */
    public function forceDelete(User $user, Message $message): bool
    {
        return false;
    }
}
