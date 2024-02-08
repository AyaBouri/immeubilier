@extends('base')
@section('content')
    <x-alert></x-alert>
    <div class="bg-light p-5 mb-5  text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis adipisci repellendus laborum cum id
                corrupti dignissimos. At illo dignissimos placeat odio molestiae voluptas officiis fugit, incidunt magnam
                aperiam, praesentium molestias?</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos Derniers Biens</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
