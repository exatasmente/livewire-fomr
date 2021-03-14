<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserEmailUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->markdown('emails.default', [
                'email'               => $notifiable->email,
            ])
            ->subject(__(':app_name - Email address updated', ['app_name' => config('app.name')]))
            ->greeting(__('Your email address has been updated'))
            ->line(
                __('The email address of your account in :app_name has been updated',['app_name' => config('app.name')])
            );
    }

}
