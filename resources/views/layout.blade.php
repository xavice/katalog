<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row align-content-center">
            <div class="col pt-3">
                <strong><a href="/">Katalóg</a></strong>
            </div>
            <div class="col">
                <form class="mt-3" action="/" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Vyhľadávanie" value="{{ request()->search}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
