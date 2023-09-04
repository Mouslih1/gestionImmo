@extends('base')
@section('title', isset($title) ? $title : 'Tous les biens')
@section('content')

    <div class="bg-light p-5 text-center">
        <form action="" class="container d-flex gap-2" method="get">
            <input type="number" placeholder="Surface minimun" name="surface" class="form-control"
                value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre ce piéces min" name="rooms" class="form-control"
                value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budge max" name="price" class="form-control"
                value="{{ $input['price'] ?? '' }}">
            <input type="text" class="form-control" placeholder="Mot clé" name="title"
                value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Recherche
            </button>
        </form>

    </div>

    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-4 mb-3">
                    @include('shared.card')
                </div>
            @empty
                <div class="justify-content-center">
                    <span class="text-danger">Aucun bien ne correspond à votre recherche</span>

                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
