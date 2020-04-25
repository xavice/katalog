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
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'author', 'order' => 'asc']), 'Autora', 'keyboard_arrow_up') !!}
                    {!! buildFilterLink(request()->fullUrlWithQuery(['sort' => 'author', 'order' => 'desc']), 'Autora', 'keyboard_arrow_down') !!}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($catalog->results as $book)
                @include('components.item', compact('book'))
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $catalog->results->appends(request()->except(['page','_token']))->links() }}
            </div>
        </div>
    </div>
@endsection
