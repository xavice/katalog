@foreach($catalog->results as $book)
    @include('components.item', compact('book'))
@endforeach
