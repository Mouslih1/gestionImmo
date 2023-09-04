@extends('base')
@section('title', isset($title) ? $title : $property->title)
@section('content')

    <div class="container">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} piéces - {{ $property->surface }} m²</h2>
        <div class="text-primary fw-blod" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: '') }} DH
        </div>

        <hr>

        <div class="mt-4">
            <h4>Intéresse par ce bien ?</h4>
            @include('shared.flash')
            <form action="{{ route('property.contact', $property) }}" class="vstack gap-3" method="post">
                @csrf
                <div class="row">
                    <x-input class="col" name="firstname" label="Prénom" placeholder="Fisrt name" />
                    <x-input class="col" name="lastname" label="Nom" placeholder="Last name" />
                </div>
                <div class="row">
                    <x-input class="col" name="phone" label="Téléphone" placeholder="Numéro de téléphone" />
                    <x-input class="col" type="email" name="email" label="Email" placeholder="Address email" />
                </div>

                <x-input class="col" type="textarea" name="message" label="Message" placeholder="Votre message" />

                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }}</td>
                        </tr>

                        <tr>
                            <td>Piéces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>

                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>

                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->address }} - {{ $property->city }} {{ $property->postal_code }}</td>
                        </tr>

                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificites</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
