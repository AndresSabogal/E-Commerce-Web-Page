<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mercatodo Medellin</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/admin/sb-admin.css" rel="stylesheet">

  <!--CKEditor Plugin-->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

  @yield('css_role_page')
  @yield('css_product_page')
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">Mercatodo</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <a href="/userViews"><button type="button" class="btn btn-outline-success btn-lg">Ver Productos</button></a>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="userViews.show" method="get" onsubmit="return showLoad()">

      <div class="input-group">
        <input type="text" name="buscarProducto" class="form-control" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2" required="required">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>



    {{-- <div class="panel panel-success">
        <form action="userViews.show" method="get" onsubmit="return showLoad()">
            <div class="panel-body">
                <input type="text" name="buscarProducto" class="form-control" placeholder="Ingresar nombre del producto" required="required">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>

        </form>
    </div> --}}





    @guest
    <div class="input-group-append">
        <a href="/login"><button type="button" class="btn btn-success">Ingresar</button></a>
        <a href="/register"><button type="button" href="/register" class="btn btn-warning">Registrarme</button></a>
    </div>
    @endguest


    <!-- Navbar -->
    @auth
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          {{ Auth::user()->name }} {{ Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : "" }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
        </div>
      </li>
    </ul>
    @endauth
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-space-shuttle"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @can('isAdmin')
        <li class="nav-item">
          <a class="nav-link" href="/roles">
            <i class="fas fa-chess"></i>
            <span>Roles</span></a>
        </li>
      @endcan
      @canany(['isAdmin','isManager'])
        <li class="nav-item">
          <a class="nav-link" href="/users">
            <i class="fas fa-user-astronaut"></i>
            <span>Usuarios</span></a>
        </li>
      @endcanany

      @canany(['isAdmin','isManager'])
      <li class="nav-item">
        <a class="nav-link" href="/products">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Productos</span></a>
      </li>
      @endcanany

      @canany(['isAdmin','isManager'])
      <li class="nav-item">
        <a class="nav-link" href="/productsCategory">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Categorias</span></a>
      </li>
      @endcanany
      @canany(['isManager, isContentEditor'])
      <li class="nav-item">
        <a class="nav-link" href="/posts">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Test</span></a>
      </li>
      @endcanany

      <!--Lista de Botones para compra-->
    <div class="btn-group-vertical">
        <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Electro
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item" href="#">Dropdown link</a>
          <a class="dropdown-item" href="#">Dropdown link</a>
        </div>
    </div>

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Tecno
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item" href="#">Dropdown link</a>
        <a class="dropdown-item" href="#">Dropdown link</a>
        </div>
    </div>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hogar
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item" href="#">Dropdown link</a>
          <a class="dropdown-item" href="#">Dropdown link</a>
        </div>
    </div>
</div>
    </ul>


    <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Mercatodo Medellin</span>
            </div>
          </div>
        </footer>

    </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Haz terminado?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Salir">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Salir" si deseas cerrar esta sesion.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

          <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Salir') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

          {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->

  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/admin/sb-admin.js"></script>

  <!-- Demo scripts for this page-->
  <script src="/js/admin/demo/datatables-demo.js"></script>


  @yield('js_post_page')
  @yield('js_user_page')
  @yield('js_role_page')
  @yield('js_product_page')
  </body>

</html>