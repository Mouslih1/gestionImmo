@extends('admin.admin')
@section('title', $option->exists ? 'Editer une option' : 'Créer une option')
@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
        method="post">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')

        <div class="row">
            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'name',
                'value' => $option->name,
                'placeHolder' => 'Nom',
            ])

        </div>

        <button class="btn btn-primary mt-3">
            @if ($option->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

    </form>
@endsection
