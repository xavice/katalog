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
