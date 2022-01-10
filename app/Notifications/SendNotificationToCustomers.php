<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNotificationToCustomers extends Notification implements ShouldQueue
{
    use Queueable;
    private $notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($dataNotify)
    {
        $this->notification = $dataNotify;
        // dd($this->notification['code']);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'code' => $this->notification['code'],
            'msg_notify' => $this->notification['msg_notify'],
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'code' => $this->notification['code'],
    //         'content' => $this->notification['content'],
    //     ];
    // }
}
