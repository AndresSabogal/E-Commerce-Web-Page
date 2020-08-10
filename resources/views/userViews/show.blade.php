@extends('admin.layouts.dashboard')

@section('content')

    <!-- check if $buscar variable is set, display buscar result -->
    @if (isset($buscar))
        <div class="panel panel-success">
            <div class="alert alert-success" role="alert">
                Estos son los productos relacionados con tu busqueda
              </div>
            <div class="panel-body">
                <div class='table-responsive'>
                    <div class="card-columns">
                        <div class="item">
                            @foreach($buscar as $product)
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset("images/products/{$product->image}") }}" alt="Product image" width="300px" height="200px" class="item-image">
                                    <div class="card-body">
                                    <h5 class="card-title"><a href="{{ url('products/'.$product->slug) }}">{{ $product->name }}</a></h5>
                                    <h5 class="card-title">Precio: ${{ $product->price}}</a></h5>
                                    <h5 class="card-title">Estado: {{ $product->status}}</a></h5>
                                    <a href="#" class="btn btn-primary">Quiero Comprar</a>
                                    </div>
                                    <div class="card-footer">
                                    <small class="text-muted">Ultima modificacion: {{$product->updated_at}}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                        {{-- <center>{{ $buscar->appends(Request::only('noticiero_turno','noticiero_programa'))->links() }}</center> --}}
                </div>

            </div>

            <div class="panel-footer">
                <a href="{{url('userViews.show')}}" class="btn btn-warning">Restaurar busqueda</a>
            </div>
        </div>
    @endif

@endsection
