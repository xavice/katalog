@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <img class="img-fluid mb-3" src="{{ $book->picture }}" alt="">
                <p>
                    <strong>{{ $book->title }}</strong> <br>
                    Autor: {{ $book->author }} <br>
                    Vydavateľ: {{ $book->publisher }} <br>
                    Rok: {{ $book->year }}
                </p>

                <h3>Popis</h3>
                <p>{{ $book->description }}</p>
            </div>
        </div>
    </div>
@endsection
