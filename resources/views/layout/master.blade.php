<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- Use a dedicated section for the page title --}}
  <title>Konser Musik | @yield('title', 'Dashboard')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css')}}">

  {{-- This is where you can inject extra CSS from child views --}}
  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layout.navbar')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin-lte/dist/img/musik-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Konser Musik</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-lte/dist/img/default-profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/artis" class="nav-link">
              <i class="nav-icon fas fa-solid fa-star"></i>
              <p>
                Artis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/konser" class="nav-link">
              <i class="nav-icon fas fa-solid fa-music"></i>
              <p>
                Konser
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tiket" class="nav-link">
              <i class="nav-icon fas fa-solid fa-money-bill"></i>
              <p>
                Tiket
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-solid fa-location-arrow"></i>
              <p>
                Lokasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Promotor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-solid fa-handshake"></i>
              <p>
                Sponsor
              </p>
            </a>
          </li>
        </ul>
      </nav>
      </div>
    </aside>

  <div class="content-wrapper">
      @include('alert.pesan')
      @yield('content')
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('admin-lte/dist/js/adminlte.js')}}"></script>
</body>
</html>