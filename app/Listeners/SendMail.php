<?php

namespace App\Listeners;

use App\Events\EventRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\MailRegister;
class SendMail
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
     * @param  EventRegister  $event
     * @return void
     */
    public function handle(EventRegister $event)
    {
        new MailRegister($event->user);


    }
}
