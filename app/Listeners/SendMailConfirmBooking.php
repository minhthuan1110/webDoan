<?php

namespace App\Listeners;

use App\Events\CustomerBooking;
use App\Mail\MailBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailConfirmBooking implements ShouldQueue
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
     * @param  CustomerBooking  $event
     * @return void
     */
    public function handle(CustomerBooking $event)
    {
        Mail::to($event->data['email'])->send(new MailBooking($event->data));
    }
}
