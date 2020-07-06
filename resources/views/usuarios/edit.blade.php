@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-5">
        <h3>Editar Usuario:{{$user->name}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('usuarios.update',$user->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                <label for="email">Direccion Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Escribe tu Email">
                <small id="emailHelp" class="form-text text-muted">Numca compartas tus datos con nadie</small>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
                
            </form>
        </div>
    </div>
</div>
@endsection