@extends('admin.layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Nombre:{{$category->name}}</h3>
            <h4>Id: {{$category->id}}</h4>
            <h4>Slug: {{$category->slug}}</h4>
            <h4>Descripcion: {{$category->description}}</h4>
            <h4>Titulo: {{$category->page_title}}</h4>
            <h4>Featured: {{$category->featured}}</h4>
            <h4>Imagen: {{$category->image}}</h4>

        </div>

        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-danger">Atras</a>
        </div>
    </div>
</div>

@endsection
