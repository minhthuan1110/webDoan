<?php

namespace App\Listeners;

use App\Events\CustomerBooking;
use App\Models\User;
use App\Notifications\SendNotificationToCustomers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CreateNotificationForCustomer implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerNotification  $event
     * @return void
     */
    public function handle(CustomerBooking $data)
    {
        // tao ban ghi trong bang notifications (user_id, content, created_at)
        Notification::send(User::find($data['user_id']), new SendNotificationToCustomers($data));
    }
}
