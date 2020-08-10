@extends('admin.layouts.dashboard')

@section('content')
    <main class="content">
        <div class="items">
            <div class="card-columns">
                @forelse($products as $product)
                    <div class="item">
                        @if($product->status=='disponible')
                            <div class="card">
                                <img class="card-img-top" src="{{ asset("images/products/{$product->image}") }}" alt="Product image" width="300px" height="200px" class="item-image">
                                <div class="card-body">
                                <h5 class="card-title"><a href="{{ url('products/'.$product->slug) }}">{{ $product->name }}</a></h5>
                                <h5 class="card-title">Precio: ${{ $product->price}}</a></h5>
                                <h5 class="card-title">Estado: {{ $product->status}}</a></h5>
                                {{-- <p class="card-text"> <a href="{{url('products/category/'.$product->category->slug)}}">{{ $product->category->name }}</a></p> --}}
                                <a href="#" class="btn btn-primary">Quiero Comprar</a>
                                </div>
                                <div class="card-footer">
                                <small class="text-muted">Ultima modificacion: {{$product->updated_at}}</small>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                <p>No se encontraron productos
                @endforelse
            </div>
        </div>
    </main>
@endsection
