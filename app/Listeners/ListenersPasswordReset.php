<?php

namespace App\Listeners;

use App\Event\EventResetPassword;
use App\Mail\MailResetPassword;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenersPasswordReset
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
     * @param  EventResetPassword  $event
     * @return void
     */
    public function handle(EventResetPassword $event)
    {
        new MailResetPassword($event->user);
        //
    }
}
