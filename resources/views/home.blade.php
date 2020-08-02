@extends('admin.layouts.dashboard')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Felicidades ahora estas registrado!
                </div>
            </div>
        </div>
    </div> --}}


    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="dist/img/electrodomesticos.jpg" class="d-block w-100" alt="..." width="1650" height="450">
            <div class="carousel-caption d-none d-md-block">
              <h3>ELECTRODOMESTICOS</h3>
              <p>Aqui encontraras los mejores electrodomesticos al mejor precio</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="dist/img/tecnologia.jpg" class="d-block w-100" alt="..." width="1650" height="450">
            <div class="carousel-caption d-none d-md-block">
              <h3>TECNOLOGIA</h3>
              <p>Encontraras lo mas avanzado en tecnologia</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="dist/img/muebles.jpg" class="d-block w-100" alt="..." width="1650" height="450">
            <div class="carousel-caption d-none d-md-block">
              <h3>MUEBLES Y HOGAR</h3>
              <p>Todo lo que necesitas para tu hogar con la mejor calidad y precios</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Atras</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Adelante</span>
        </a>
      </div>

</div>
@endsection
