<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1><a href="/">Katalóg</a></h1>

    <div class="container">
        <div class="row">
            @foreach($catalog->books as $book)
                <div  class="col-sm-3 mb-4 ">
                    <div class="item p-3 border">
                        <div class="text-center mb-3">
                            <img class="img-fluid" src="{{ $book->picture }}" alt="">
                        </div>

                        <p>
                            <strong>{{ $book->title }}</strong> <br>
                            Autor: {{ $book->author }} <br>
                            Vydavateľ: {{ $book->publisher }} <br>
                            Rok: {{ $book->year }}
                        </p>
                        <a href="{{ route('detail', ['id' => $book->id]) }}">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
