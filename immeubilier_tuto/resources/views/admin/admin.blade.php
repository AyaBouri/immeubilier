<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdlivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl603oVMWSktQOp6b7In1Zl3/Jr59b6EGG59b6EGG0I1aFkw7
        cmDA6j6gD" crossorigin="anonymous">
        <title>@yield('title') | Administration</title>
    </head>
    <body>
        <div class="container mt-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
