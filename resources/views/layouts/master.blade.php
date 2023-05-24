  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prime</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/bootstrap1.css" type="text/css" media="screen">
   <link rel="stylesheet" href="/printcss" type="text/css" media="print">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css">
  <link rel="stylesheet" type="text/css" href="bootstrap1.css">

   
  <!-- Font Awesome -->

  <!-- Theme style -->
  


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   







    </ul>
  </nav>

  
  </div>

</div>

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <a href="/home" style="text-align: center " class="brand-link">
      <img style="width: 130px; height: auto; border-radius: 5px; " src="/images/prime1.jpg" alt="AdminLTE Logo" class="brandimage imgcircle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>


      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/home" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
        
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-file-invoice"></i>
                Invoices
                <i class="fas fa-angle-left right"></i>
              </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/invoices" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      Invoice List
                    </a>
                  </li>
                </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-sharp fa-solid fa-bell-concierge"></i>
                Services
            <i class="fas fa-angle-left right"></i>
             </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/services" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service List</p>
                </a>
                
              </li>
              </a>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-sharp fa-solid fa-users"></i>
                Client
                <i class="fas fa-angle-left right"></i>
              </a>
        
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/clients" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client list</p>
          </a>
          </li>
           </a>
        </ul>
        @if(auth()->user()->role != "supervisor")
         </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-flag-checkered"></i>
                Report
             <i class="fas fa-angle-left right"></i>
                </a>
        
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report list</p>
          </a>
          </li>
          @endif
           </a>
        </ul>
         </li>
         @if(auth()->user()->role =='admin')
          <button class="btn btn-primary" > <a href="/register/user">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  Register
          </a>
          </button> 
          @endif
         <form action="{{route('logout')}}" method="POST">
          @csrf
           {{-- @method('DELETE') --}}
                <button type="submit" style="margin-top: 135px" class="btn btn-danger btn-sm ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  LogOut
                </button>
          </form>





      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div>

      
    </div>

  <div class="container">
    @yield('content')
  </div>


<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

{{-- <script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script> --}}
  <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
{{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/select2/js/select2.full.min.js"></script>

<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {




    //Date range picker
    $('#reservation').daterangepicker()
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker

  })

</script>


</body>
</html>