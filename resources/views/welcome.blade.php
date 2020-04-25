@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Celkový počet kníh{{ request()->search ? ' vyhovujúcemu hľadaniu ' . request()->search: '' }}: {{ $catalog->results->total() }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong>Zoradiť podľa</strong>
                <div class="mt-1">
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'title', 'order' => 'asc']), 'Abecedy', 'keyboard_arrow_up') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'title', 'order' => 'desc']), 'Abecedy', 'keyboard_arrow_down') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'year', 'order' => 'asc']), 'Roku vydania', 'keyboard_arrow_up') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'year', 'order' => 'desc']), 'Roku vydania', 'keyboard_arrow_down') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'rating', 'order' => 'asc']), 'Hodnotenia', 'keyboard_arrow_up') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'rating', 'order' => 'desc']), 'Hodnotenia', 'keyboard_arrow_down') !!}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($catalog->results as $book)
                <div class="col-xs-12 col-md-6 col-lg-3 mb-4">
                    <div class="item p-3 border h-100 d-flex flex-column">
                        <div class="text-center mb-3">
                            <img class="img-fluid" src="{{ $book->picture}}"  alt="{{ $book->title }}"
                                 onerror="this.onerror=null;this.src='{{ asset('images/no-image.jpg') }}';">
                        </div>
                        <div class="mt-auto">
                            <strong>{{ $book->title }}</strong> <br>
                            {{ $book->author ?: 'Neuvedený' }} <br>
                            <small>{{ $book->publisher }}, {{ $book->year }}</small> <br>
                            <small>Hodnotenie: {{ $book->rating }}</small>
                        </div>
                        <a href="{{ route('detail', ['id' => $book->id]) }}">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $catalog->results->appends(request()->except(['page','_token']))->links() }}
            </div>
        </div>
    </div>
@endsection
