@extends('base')
@section('content')
    <div class="bg-light p-5 m-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo officiis non voluptatum animi laborum error
                eius dicta tempora veritatis blanditiis. Ducimus fugiat perspiciatis ipsam! Laudantium laborum esse at aliquid sit!</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos Dernier Bien</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col"></div>
            @endforeach
        </div>
    </div>
@endsection
