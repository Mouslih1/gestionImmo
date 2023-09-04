<?php

namespace App\Listeners;

use App\Events\ContactRequestListener;
use App\Mail\propertyContactMail;
use App\View\Components\ContactRequestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class ContactListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestEvent $event): void
    {
        sleep(3);
        $this->mailer->send(new propertyContactMail($event->property, $event->data));
    }
}
