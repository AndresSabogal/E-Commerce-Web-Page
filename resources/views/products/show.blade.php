@extends('admin.layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Nombre: {{$product->name}}</h3>
            <h4>Id: {{$product->id}}</h4>
            <h4>descripcion: {{$product->description}}</h4>
            <h4>Estatus: {{$product->status}}</h4>
            <h4>Categoria: {{$product->category_id}}</h4>

        </div>

        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Atras</a>
        </div>
    </div>
</div>

@endsection
