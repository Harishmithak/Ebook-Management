<?php

namespace App\Listeners;
use App\Events\SubscriptionConfirmed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;

class SendSubscriptionConfirmationEmail implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(SubscriptionConfirmed $event)
    {
        $data = $event->data;
        sleep(5);
       
        Mail::to($data['email'])->send(new SubscriptionConfirmation($data));
    }
}
