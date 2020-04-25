@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <img class="img-fluid mb-3" src="{{ $book->picture }}" alt="">
                <div>
                    <h1>{{ $book->title }}</h1>
                    Autor: {{ $book->author }} <br>
                    Vydavateľ: {{ $book->publisher }} <br>
                    Rok: {{ $book->year }}
                </div>
                <div class="mt-3">
                    <strong>Popis</strong>
                    <p>{{ $book->description }}</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h2>Odporúčané knihy</h2>
            </div>
        </div>
        <div class="row">
            @foreach($book->recommended() as $recommended_book)
                @include('components.item', ['book' => $recommended_book])
            @endforeach
        </div>
    </div>
@endsection
