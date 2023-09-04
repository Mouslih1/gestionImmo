<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>
</head>
@php
    $route = request()
        ->route()
        ->getName();
@endphp

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('property.index') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => Str::contains($route, 'property.')]) aria-current="page"
                            href="#">Gérer les biens</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.option.index') }}" @class(['nav-link', 'active' => Str::contains($route, 'option.')]) aria-current="page"
                            href="#">Gérer les options</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <div class="collapse navbar-collapse" id="navbarNav">
                    @auth
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <div class="nav-item">
                                <button class="nav-link">Se déconnecter</button>
                            </div>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
    <div class="container mt-5">

        @include('shared.flash')
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script>
    new TomSelect('select[multiple]', {
        plugins: {
            remove_button: {
                title: 'Suppprimer'
            }
        }
    })
</script>

</html>
