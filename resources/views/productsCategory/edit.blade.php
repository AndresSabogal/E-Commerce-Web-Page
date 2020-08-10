@extends('admin.layouts.dashboard')

@section('content')

<h2>Editar Categoria</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/productsCategory/{{$category->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()


    <div class="form-group">
        <label for="category_name">Nombre de la categoria</label>
        <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Nombre de la categoria..." value="{{$category->name}}" required>
    </div>
    <div class="form-group">
        <label for="category_slug">Slug</label>
        <input type="text" name="category_slug" tag="category_slug" class="form-control" id="category_slug" placeholder="Slug..." value="{{$category->slug}}" required>
    </div>
    <div class="form-group">
        <label for="category_description">Descripcion del producto</label>
        <input type="text" name="category_description" class="form-control" id="category_description" placeholder="Descripcion del producto..." value="{{$category->description}}" required>
    </div>
    <div class="form-group">
        <label for="category_page_title">Titulo de pagina</label>
        <input type="text" name="category_page_title" tag="category_page_title" class="form-control" id="category_page_title" placeholder="Titulo de pagina..." value="{{$category->page_title}}" required>
    </div>
    <div class="form-group">
        <label for="category_image">Imagen</label>
        <input type="text" name="category_image" tag="category_image" class="form-control" id="category_image" placeholder="Referencia de la imagen" value="{{$category->image}}" required>
    </div>
    <div class="form-group">
        <label for="category_page_title">Titulo de pagina</label>
        <input type="text" name="category_page_title" tag="category_page_title" class="form-control" id="category_page_title" placeholder="Titulo de pagina..." value="{{$category->page_title}}" required>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Actualizar">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Atras</a>
    </div>
</form>

@endsection
