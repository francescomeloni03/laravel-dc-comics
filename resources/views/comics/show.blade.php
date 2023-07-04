@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Dettagli Fumetto:</h1> 
    <h3> Title: {{$comic->title}}</h3>
    <h3> Description: {{$comic->description}}</h3>
    <h3> Price: {{$comic->price}}</h3>
    <h3> Series: {{$comic->series}}</h3>
    <h3> Sale_date: {{$comic->sale_date}}</h3>
    <h3> Type: {{$comic->type}}</h3>
    <div class="row g-4">
        <div class="col">
            <a href="{{ route("home") }}">Torna alla lista prodotti</a>
        </div>
    </div>

</div>
@endsection