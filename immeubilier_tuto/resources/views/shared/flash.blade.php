@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if($errors->all())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach($error->all() as $errors)
                {{@$error}}
            @endforeach
        </ul>
    </div>
@endif
