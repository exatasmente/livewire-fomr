<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\NewUserNotification;
use App\Notifications\UserEmailUpdatedNotification;

class UserObserver
{
    public function created(User $user)
    {
        $user->notify(new NewUserNotification());
    }

    public function updated(User $user)
    {
        if ($user->isDirty('email'))
        {
            $user->notify(new UserEmailUpdatedNotification());
        }
    }
}
