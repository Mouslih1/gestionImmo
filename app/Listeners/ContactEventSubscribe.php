<?php

namespace App\Listeners;

use App\Mail\propertyContactMail;
use App\View\Components\ContactRequestEvent;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactEventSubscribe
{
    public function __construct(private Mailer $mailer)
    {

    }

    public function sendEmailForContact(ContactRequestEvent $event)
    {
        $this->mailer->send(new propertyContactMail($event->property, $event->data));
    }

    public function subscribe(Dispatcher $dispatcher): array
    {
        return [
            ContactRequestEvent::class => 'sendEmailForContact'
        ];
    }
}
