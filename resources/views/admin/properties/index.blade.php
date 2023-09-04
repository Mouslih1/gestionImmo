@extends('admin.admin')
@section('title', isset($title) ? $title : 'Tous les biens')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Surface</th>
                <th scope="col">Prix</th>
                <th scope="col">Ville</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <th scope="row">{{ $property->title }}</th>
                    <td>{{ $property->surface }}</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-warning">editer</a>
                            @can('delete',$property)
                                <form action="{{ route('admin.property.destroy', $property) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            @endcan

                        </div>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $properties->links() }}
@endsection
