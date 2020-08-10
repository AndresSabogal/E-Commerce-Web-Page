@extends('admin.layouts.dashboard')

@section('content')

<h1>Crear Nuevo Producto</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/products">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="product_name">Nombre del producto</label>
        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nombre del producto..." value="{{ old('product_name') }}" required>
    </div>
    <div class="form-group">
        <label for="product_slug">Slug</label>
        <input type="text" name="product_slug" tag="product_slug" class="form-control" id="product_slug" placeholder="Slug..." value="{{ old('product_slug') }}" required>
    </div>
    <div class="form-group">
        <label for="product_description">Descripcion del producto</label>
        <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Descripcion del producto..." value="{{ old('product_description') }}" required>
    </div>
    <div class="form-group">
        <label for="product_page_title">Titulo de pagina</label>
        <input type="text" name="product_page_title" tag="product_page_title" class="form-control" id="product_page_title" placeholder="Titulo de pagina..." value="{{ old('product_page_title') }}" required>
    </div>
    <div class="form-group">
        <label for="product_image">Imagen</label>
        <input type="text" name="product_image" tag="product_image" class="form-control" id="product_image" placeholder="Referencia de la imagen" value="{{ old('product_image') }}" required>
    </div>
    <div class="form-group">
        <label for="product_status">Estatus</label>
        <input type="text" name="product_status" tag="product_status" class="form-control" id="product_status" placeholder="Estado del producto [disponible, agotado, promocion]" value="{{ old('product_status') }}" required>
    </div>
    <div class="form-group">
        <label for="product_category">Selecciona una categoria</label>
        <select class="category form-control" name="category" id="category">
            <option value="">Selecciona una categoria</option>
            @foreach ($categories as $category)
            <option data-category-id="{{$category->id}}" data-category-slug="{{$category->slug}}" value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Crear">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Atras</a>
    </div>

</form>

@section('css_product_page')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js_product_page')
    <script src="/js/admin/bootstrap-tagsinput.js"></script>

    <script>

        $(document).ready(function(){
            $('#product_name').keyup(function(e){
                var str = $('#product_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#product_slug').val(str);
                $('#product_slug').attr('placeholder', str);
            });
        });

    </script>

@endsection


@endsection
