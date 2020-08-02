@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form action="/usuarios" method="POST">
                @csrf
                <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Escribe tu nombre">
                </div>
                <div class="form-group">
                <label for="email">Direccion Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Escrube tu Email">
                <small id="emailHelp" class="form-text text-muted">Numca compartas tus datos con nadie</small>
                </div>
                <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
                
            </form>
        </div>
    </div>
</div>
@endsection --}}

@section('content')

<h1>Create New  User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/users" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="name">User name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirm</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div>
    <div class="form-group">
        <label for="role">Select Role</label>

        <select class="role form-control" name="role" id="role">
            <option value="">Select Role...</option>
            @foreach ($roles as $role)
            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    
    <div id="permissions_box" >
        <label for="roles">Select Permissions</label>
        <div id="permissions_ckeckbox_list">
        </div>
    </div>     

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>    

@section('js_user_page')

    <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_ckeckbox_list.empty();

                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    
                    console.log(data);
                    
                    permissions_box.show();                        
                    // permissions_ckeckbox_list.empty();

                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(       
                            '<div class="custom-control custom-checkbox">'+                         
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );

                    });
                });
            });
        });

    </script>

@endsection


@endsection