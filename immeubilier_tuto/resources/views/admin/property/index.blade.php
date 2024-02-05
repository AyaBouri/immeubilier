@extends('admin.admin')
@section('content')
    <h1>Le biens</h1>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Les Biens</h1>
        <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($property as $properties)
            <tr>
                <td>{{$property->title}}</td>
                <td>{{$property->surface}} m²</td>
                <td>{{number_format($property->price,thousands_separator: ' ')}}</td>
                <td>{{$property->city}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$property->links()}}
@endsection
