<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Pangkalan Data - SPMI Universitas Tadulako</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{URL::asset('vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{URL::asset('vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{URL::asset('css/demo.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/libs/apex-charts/apex-charts.css')}}" />
    <script src="{{URL::asset('vendor/js/helpers.js')}}"></script>
    <script src="{{URL::asset('vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{URL::asset('js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/dashboard" class="app-brand-link" style="margin-left: -15px">
              <span class="app-brand-logo demo">
                <img src="/images/untadlogo.png" alt="" width="35px">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-family: sans-serif">portaldata.</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            @include('admin.layout._dashboard')
            @include('admin.layout._admin')
            @include('admin.layout._universitas')
            @include('admin.layout._rektor')
            @include('admin.layout._dekan')
            @include('admin.layout._prodi')
            @include('admin.layout._informasi')
            

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- Place this tag where you want the button to render. -->
                
              </ul>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <span class="badge bg-label-primary">{{ $periode_aktif }}</span> <!-- View share di AppServiceProvider -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="/images/no-profile-picture-icon-1.png" alt="" class="w-px-40 h-auto rounded-circle">
                    </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">         
                    <li></li>
                    <li>
                      <div class="dropdown-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="/images/no-profile-picture-icon-1.png" alt="" class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ucwords(auth()->user()->name) ?? 'User'}}</span>
                            <small class="text-muted">{{ucwords(auth()->user()->roles[0]->name) ?? 'User'}}</small>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <form action="/auth/logout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="bx bx-log-in me-2"></i> Logout</button>
                      </form>
                    </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->
            <!-- / Content -->

            <!-- Footer -->

            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/demo.css')}}">
    <script src="{{URL::asset('vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{URL::asset('vendor/libs/popper/popper.js')}}"></script>
    <script src="{{URL::asset('vendor/js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{URL::asset('vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{URL::asset('vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{URL::asset('js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{URL::asset('js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
