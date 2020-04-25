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
</body>
</html>
