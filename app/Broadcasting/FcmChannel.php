<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;

use App\Models\User;

class FcmChannel
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
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }

    public function send($notifiable, Notification $notification)
    {
        $notification->tofcm($notifiable, $notification);
    }
}