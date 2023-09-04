<?php

namespace App\View\Components;

use App\Models\Property;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\View\Component;

class ContactRequestEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new component instance.
     */
    public function __construct(public Property $property, public array $data)
    {

    }
}
