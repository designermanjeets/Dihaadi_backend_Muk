<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;

class OneSingleChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }

    // public function send($notifiable, Notification $notification)
    // {
    //     $notification->toOneSignal($notifiable, $notification);
    // }
}
