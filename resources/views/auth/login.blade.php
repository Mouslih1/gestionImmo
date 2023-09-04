@extends('admin.admin')
@section('title', isset($title) ? $title : 'Se connecter')
@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        <form action="{{ route('login.do') }}" method="POST">
            @csrf

            @include('shared.input', [
                'type' => 'text',
                'class' => 'form-group col',
                'name' => 'email',
                'placeHolder' => 'Address Email',
            ])
            @include('shared.input', [
                'type' => 'password',
                'class' => 'form-group col',
                'name' => 'password',
                'placeHolder' => 'Password',
            ])

            <button class="btn btn-primary mt-4" type="submit">Se connecter</button>

        </form>


    </div>

@endsection
