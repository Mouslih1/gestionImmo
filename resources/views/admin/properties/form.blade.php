@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')
@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
        method="post">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'title',
                'value' => $property->title,
                'placeHolder' => 'Title',
            ])
            <div class="col row">
                @include('shared.input', [
                    'type' => 'text',
                    'class' => 'form-group col',
                    'name' => 'surface',
                    'value' => $property->surface,
                    'placeHolder' => 'Surface',
                ])
                @include('shared.input', [
                    'type' => 'text',
                    'class' => 'form-group col',
                    'name' => 'price',
                    'value' => $property->price,
                    'placeHolder' => 'Prix',
                ])
            </div>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'class' => 'form-group',
            'name' => 'description',
            'value' => $property->description,
            'placeHolder' => 'Content',
        ])
        <div class="row">
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'rooms',
                'value' => $property->rooms,
                'placeHolder' => 'Pieces',
            ])
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'bedrooms',
                'value' => $property->bedrooms,
                'placeHolder' => 'Chambres',
            ])
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'floor',
                'value' => $property->floor,
                'placeHolder' => 'Etage',
            ])
        </div>

        <div class="row">
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'address',
                'value' => $property->address,
                'placeHolder' => 'Address',
            ])
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'city',
                'value' => $property->city,
                'placeHolder' => 'City',
            ])
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'postal_code',
                'value' => $property->postal_code,
                'placeHolder' => 'Postal code',
            ])
        </div>
        @include('shared.checkout', [
            'name' => 'sold',
            'value' => $property->sold,
            'label' => 'Vendu',
        ])
        @include('shared.select', [
            'name' => 'options',
            'value' => $property->options()->pluck('id'),
            'multiple' => true,
        ])

        <button class="btn btn-primary mt-3">
            @if ($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

    </form>
@endsection
