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
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">Agence</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"></button>
                <span class="navbar-toggler-icon"></span>
                @php
                    $route=request()->route()->getName();
                @endphp
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" @class(['nav-link','active'=>str_contains($route,'property.')])>Gérer les biens</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" @class(['nav-link','active'=>str_contains($route,'property.')])>Gérer les options</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if($errors->all())
                <div class="alert alert-danger">
                    <ul class="my-0">
                        @foreach($error->all() as $errors)
                            {{@$errors}}
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
