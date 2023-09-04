<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $properties = Property::recent()->available()->limit(4)->get();

        return view('front.home',[
            'properties' => $properties
        ]);
    }
}
