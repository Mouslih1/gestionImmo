<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\propertyCollection;
use App\Http\Resources\propertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class propertyController extends Controller
{
    public function index()
    {
        //return propertyResource::collection(Property::paginate(5));
        return propertyResource::collection(Property::limit(5)->with('options')->get());
        //return new propertyResource(Property::find(1));
    }
}
