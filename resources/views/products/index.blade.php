@extends('admin.layouts.dashboard')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Esta es la lista de productos</h2>
    </div>
    <div class="col-md-6">
        <a href="/products/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Producto</a>
    </div>
</div>


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de productos</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Estatus</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Estatus</th>
                <th scope="col">Opciones</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($products as $product)
                @if(!\Auth::user()->hasRole('admin') && $user->hasRole('admin')) @continue; @endif

                    <td>{{$product['id']}}</td>
                    <td>carajo</td>
                    {{-- <td>{{$product->category['name']}}</td> --}}
                    <td>{{$product['name']}}</td>
                    <td>{{$product['slug']}}</td>
                    <td>{{$product['description']}}</td>
                    <td>{{$product['image']}}</td>
                    <td>{{$product['status']}}</td>

                    <td>
                        <a href="/products/{{ $product['id'] }}"><i class="fas fa-glasses"></i></a>
                        <a href="/products/{{ $product['id'] }}/edit"><i class="fas fa-marker"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal" data-productid="{{$product['id']}}"><i class="fa fa-poo"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estas seguro de borrar este producto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Selecciona "Borrar" si realmente quieres borrar este producto.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @method('DELETE')
                    @csrf
                    {{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}
                    <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Borrar</a>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

@section('js_product_page')

<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/js/admin/demo/chart-area-demo.js"></script>

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var product_id = button.data('productid')

            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/products/' + product_id);
        })
    </script>

@endsection

@endsection
