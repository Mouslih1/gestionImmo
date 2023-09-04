<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\propertyFormRequest;
use App\Models\Option;
use App\Models\Property;

class propertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index',[
            'properties' => Property::orderBy('created_at','desc')->paginate(10)
        ]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Casablanca',
            'postal_code' => 220000,
            'sold' => false
        ]);
        return view('admin.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name','id')
        ]);
    }

    public function store(propertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été créer');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name','id')
        ]);
    }

    public function update(propertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été modifier');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimer');
    }
}
