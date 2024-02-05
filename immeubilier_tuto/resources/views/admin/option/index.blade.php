@extends('admin.admin')
@section('title','Toutes les options')
@section('content')
    <h1>Le biens</h1>
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($option as $options)
            <tr>
                <td>{{$option->name}}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{route('admin.option.edit',$option)}}">Editer</a>
                        <form action="{{route('admin.option.destroy',$option)}}" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$option->links()}}
@endsection
