@extends('admin.admin')
@section('tilte',$option->exists ? "Editer une option" : "Créer une option")
@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($option->exists ? 'admin.property.update':'admin.property.store',$option)}}" method="post">
        @csrf
        @method($option->exists ? 'put':'post')
        @include('shared.input',['name'=>'name','label'=>'Nom','value'=>$option->name])
        <button class="btn btn-primary">
            @if($option->exists)
                Modifier
            @else
                Crée
            @endif
        </button>
    </form>
@endsection
