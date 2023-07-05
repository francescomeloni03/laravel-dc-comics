@extends('layouts.app')

@section('content')

<div class="container my-3">
    <div>
     <a class="btn btn-primary mb-2" href="{{ route("comics.edit", $comic) }}">Modifica questo Fumetto</a>         
    </div>
    <h1>Dettagli Fumetto:</h1> 
    <h3> Title: {{$comic->title}}</h3>
    <h3> Description: {{$comic->description}}</h3>
    <h3> Price: {{$comic->price}}</h3>
    <h3> Series: {{$comic->series}}</h3>
    <h3> Sale_date: {{$comic->sale_date}}</h3>
    <h3> Type: {{$comic->type}}</h3>
    <form action="{{ route('comics.destroy', $comic) }}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger mt-2 mb-2" type="submit" value="Cancella questo Fumetto">
    </form>
    <div class="row g-4">
        <div class="col">
            <a href="{{ route("home") }}">Torna alla lista prodotti</a>
        </div>
    </div>

</div>
@endsection