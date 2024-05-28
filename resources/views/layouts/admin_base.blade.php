<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>3i Islamic Institute</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/summernote/summernote-bs4.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @livewireStyles
</head>
<body class="sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin_dashboard" class="brand-link">
      {{-- <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo1" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">3i Islamic Institute</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ (request()->segment(2) == '') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>

          

          <li class="nav-item menu-open">
            <a href="{{route('admin.financial_reports')}}" class="nav-link {{ (request()->segment(2) == 'financial-reports') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Financial Reports

              </p>
            </a>

          </li>
          
          <li class="nav-item menu-open">
            <a href="{{route('admin.customer_subscriptions')}}" class="nav-link {{ (request()->segment(2) == 'customer_subscriptions') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Subscriptions

              </p>
            </a>

          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.all_categories')}}" class="nav-link {{ (request()->segment(2) == 'all-categories') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Types

              </p>
            </a>

          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.all_subjects')}}" class="nav-link {{ (request()->segment(2) == 'all-subjects') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Subjects

              </p>
            </a>

          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.all_instructors')}}" class="nav-link {{ (request()->segment(2) == 'all-instructors') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Instructors

              </p>
            </a>

          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.all_courses')}}" class="nav-link {{ (request()->segment(2) == 'all-courses') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Courses

              </p>
            </a>

          </li>
            <li class="nav-item menu-open">
                <a href="{{route('admin.add_question')}}" class="nav-link {{ (request()->segment(2) == 'add-question') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Add Question
                    </p>
                </a>
            </li>

            <li class="nav-item menu-open">
                <a href="{{route('admin.question_list')}}" class="nav-link {{ (request()->segment(3) == 'list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                         Question List
                    </p>
                </a>
            </li>


            <li class="nav-item menu-open">
                <a href="{{route('admin.create.question-paper')}}" class="nav-link {{ (request()->segment(2) == 'create-question-paper') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Create Question Paper
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('admin.question_paper_list')}}" class="nav-link {{ (request()->segment(3) == 'paper') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                         Question Paper List
                    </p>
                </a>
            </li>

            <li class="nav-item menu-open">
              <a href="{{route('admin.testimonials')}}" class="nav-link {{ (request()->segment(2) == 'testimonials') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                       Testimonials
                  </p>
              </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.all_faq_categories')}}" class="nav-link {{ (request()->segment(2) == 'all_faq_categories') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     FAQ's Types
                </p>
            </a>
        </li>

          <li class="nav-item menu-open">
            <a href="{{route('admin.faq_components')}}" class="nav-link {{ (request()->segment(2) == 'faq_components') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     FAQ's
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{route('admin.key_features')}}" class="nav-link {{ (request()->segment(2) == 'key_features') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                   Key Features
              </p>
          </a>
      </li>

            <li class="nav-item menu-open">
              <a href="{{route('admin.contact_info')}}" class="nav-link {{ (request()->segment(2) == 'contact_info') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                       Contact Info
                  </p>
              </a>
          </li>

            

          <li class="nav-item menu-open">
            <a href="{{route('admin.all_users')}}" class="nav-link {{ (request()->segment(2) == 'all-users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Users

              </p>
            </a>

          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.update_settings')}}" class="nav-link {{ (request()->segment(2) == 'update_settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Settings

              </p>
            </a>

          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->segment(2) == 'home-page') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                CMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.update_home_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_about_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_course_offers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Offers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_course_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_faq_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_policy_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_term_page')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Term</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.update_contact')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>

              
            </ul>
          </li>


          
          <li class="nav-item menu-open">


            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        class="nav-link btn-danger flex-ctr-spb"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <span>{{ __('Log out') }}</span>
                                  <span class="icon">

                    </span>
                </x-dropdown-link>
            </form>




      </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{$slot}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">Institute</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('assets/backend/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend/dist/js/pages/dashboard.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@stack('scripts')
@stack('summernote')
@livewireScripts
</body>
</html>
