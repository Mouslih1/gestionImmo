@extends('base')
@section('title',isset($title) ? $title : 'Biens')
@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence lorum agence</h1>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i
            ndustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
            into electronic typesetting, remaining essentially unchanged.
        </p>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property )
                <div class="col">
                    @include('shared.card')
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
