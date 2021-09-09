
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Purchase | Control</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
   <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('css/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('css/toasts.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('css/select2.css')}}">
  <link rel="stylesheet" href="{{url('css/select2-bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('css/admin.css')}}">

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{url('img/AdminLTELogo.png')}}" alt="PurchaseControl Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PControl 1.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
             <a href="{{route('home')}}" class="nav-link {{isActive('home')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('autorization.index')}}" class="nav-link {{isActive('autorization')}}">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>Autorizações</p>
            </a>
          </li>       
          <li class="nav-item ">
            <a href="{{ route('clients.index') }}" class="nav-link {{isActive('clients')}}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>Clientes/Obras</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{ route('providers.index') }}" class="nav-link {{isActive('providers')}}">
              <i class="nav-icon fas fa-store"></i>
              <p>Fornecedores</p>
            </a>
          </li>      
          <li class="nav-item ">
            <a href="{{ route('branches.index') }}" class="nav-link {{isActive('branches')}}">
              <i class="nav-icon fas fa-medal"></i>
              <p>Filiais</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('users.index')}}" class="nav-link {{isActive('users')}}">
              <i class="nav-icon fas fa-users"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('config.index')}}" class="nav-link {{isActive('config')}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Configurações</p>
            </a>
          </li>      
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sair</p>{{--  --}}
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 

    <!-- Main content -->
   @yield('content')
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="">PurchaseControl</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/jquery.mask.js')}}"></script>


<!-- Bootstrap 4 -->
<script src="{{url('js/bootstrap.js')}}"></script>
<!-- Select2 -->
<script src="{{url('js/select2.js')}}"></script>

<script src="{{url('js/toastr.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('js/adminLte.js')}}"></script>
<script src="{{url('plugins/demo.js')}}"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
       
    // DATATABLES
    $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "pageLength": 25,
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    // MASK
    var cellMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        cellOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(cellMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.mask-cell').mask(cellMaskBehavior, cellOptions);
    $('.mask-phone').mask('(00) 0000-0000');
    $(".mask-date").mask('00/00/0000');
    $(".mask-datetime").mask('00/00/0000 00:00');
    $(".mask-month").mask('00/0000', {reverse: true});
    $(".mask-doc").mask('000.000.000-00', {reverse: true});
    $(".mask-cnpj").mask('00.000.000/0000-00', {reverse: true});
    $(".mask-zipcode").mask('00000-000', {reverse: true});
    $(".mask-money").mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});

    // SEARCH ZIPCODE
    $('.zip_code_search').blur(function () {

    function emptyForm() {
        $(".street").val("");
        $(".neighborhood").val("");
        $(".city").val("");
        $(".state").val("");
    }

      var zip_code = $(this).val().replace(/\D/g, '');
      var validate_zip_code = /^[0-9]{8}$/;

      if (zip_code != "" && validate_zip_code.test(zip_code)) {

          $(".street").val("");
          $(".neighborhood").val("");
          $(".city").val("");
          $(".state").val("");

          $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {

              if (!("erro" in data)) {
                  $(".street").val(data.logradouro);
                  $(".neighborhood").val(data.bairro);
                  $(".city").val(data.localidade);
                  $(".state").val(data.uf);
              } else {
                  emptyForm();
                  alert("CEP não encontrado.");
              }
          });
      } else {
          emptyForm();
          alert("Formato de CEP inválido.");
      }
      });
    

  });
</script>
</body>
</html>
