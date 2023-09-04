<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\propertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\searchPropertyForm;
use App\View\Components\ContactRequestEvent;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\PropertyContactRequest;
use App\Notifications\ContactRequestNotification;

class propertyController extends Controller
{
    public function index(searchPropertyForm $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');
        if($price = $request->validated('price'))
        {
            $query = $query->where('price', '<=' , $price);
        }

        if($surface = $request->validated('surface'))
        {
            $query = $query->where('surface', '>=' , $surface);
        }

        if($rooms = $request->validated('rooms'))
        {
            $query = $query->where('rooms', '>=' , $rooms);
        }

        if($title = $request->validated('title'))
        {
            $query = $query->where('title', 'like' , "%{$title}%");
        }

        return view('front.property.index',[
            'properties' => $query->paginate(10),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug,Property $property)
    {
        $exceptSlug = $property->getSlug();
        if($slug != $exceptSlug)
        {
            return to_route('property.show', ['slug' => $exceptSlug, 'property'=> $property]);
        }

        return view('front.property.show',[
            'property' => $property
        ]);
    }

    public function contact(Property $property,PropertyContactRequest $request)
    {
        event(new ContactRequestEvent($property, $request->validated()));
        //Notification::route('mail','mouslih@admin.com')->notify(new ContactRequestNotification($property,$request->validated()));
        /** @var User $user */
        /* $user = User::first();
        $user->notify(new ContactRequestNotification($property, $request->validated()));*/
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
    }
}
