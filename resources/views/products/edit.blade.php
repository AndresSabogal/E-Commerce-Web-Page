@extends('admin.layouts.dashboard')

@section('content')

<h2>Editar Producto</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()


    <div class="form-group">
        <label for="product_name">Nombre del producto</label>
        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nombre del producto..." value="{{$product->name}}" required>
    </div>
    <div class="form-group">
        <label for="product_slug">Slug</label>
        <input type="text" name="product_slug" tag="product_slug" class="form-control" id="product_slug" placeholder="Slug..." value="{{$product->slug}}" required>
    </div>
    <div class="form-group">
        <label for="product_description">Descripcion del producto</label>
        <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Descripcion del producto..." value="{{$product->description}}" required>
    </div>
    <div class="form-group">
        <label for="product_page_title">Titulo de pagina</label>
        <input type="text" name="product_page_title" tag="product_page_title" class="form-control" id="product_page_title" placeholder="Titulo de pagina..." value="{{$product->page_title}}" required>
    </div>
    <div class="form-group">
        <label for="product_image">Imagen</label>
        <input type="text" name="product_image" tag="product_image" class="form-control" id="product_image" placeholder="Referencia de la imagen" value="{{$product->image}}" required>
    </div>
    <div class="form-group">
        <label for="product_status">Estatus</label>
        <input type="text" name="product_status" tag="product_status" class="form-control" id="product_status" placeholder="Estado del producto [disponible, agotado, promocion]" value="{{$product->status}}" required>
    </div>



    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Actualizar">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Atas</a>
    </div>
</form>
   
@endsection
