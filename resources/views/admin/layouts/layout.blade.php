<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
  data-assets-path="{{asset('dashboards/assets/')}}" data-template="vertical-menu-template-free" data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>ASML</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('dashboards/assets/img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/fonts/boxicons.css')}}" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/css/core.css')}}"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/css/theme-default.css')}}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('dashboards/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{asset('dashboards/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
  <!-- toster -->
  <link rel="stylesheet" href="{{asset('customcssjs/toster.min.css')}}" />
  <link rel="stylesheet" href="{{asset('customcssjs/bootstrap-icons.min.css')}}" />

  <!-- Page CSS -->
  <!-- Data Table CSS local server -->
  <link rel="stylesheet" href="{{asset('dataTable/dataTables.bootstrap5.min.css')}}">
  <link rel="stylesheet" href="{{asset('dataTable/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('dataTable/searchBuilder.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('dataTable/dataTables.dateTime.min.css')}}">
  <!-- Helpers -->
  <script src="{{asset('dashboards/assets/vendor/js/helpers.js')}}"></script>
  <script src="{{asset('dashboards/assets/js/config.js')}}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{route('adminDashboard')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Single E-Com</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- dashboards -->

          <li class="menu-item {{ request()->is('adminDashboard') ? 'active' : '' }}">
            <a href="{{route('adminDashboard')}}" class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="menu-icon tf-icons bx bx-home-smile"></i>
              <div class="text-truncate" data-i18n=" menu">Dashboard</div>
            </a>
          </li>

          <!-- Category -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Category</span>
          </li>

          <li class="menu-item">
            <a href="{{route('category')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n=" menu">All Category</div>
            </a>
          </li>

          <!-- Sub Category-->
          <li class="menu-header small text-uppercase {{ request()->is('subcategory.index') ? 'active open' : '' }}">
            <span class="menu-header-text">Sub Category</span>
          </li>

          <li class="menu-item">
            <a href="{{route('subcategory.index')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n="Without navbar">All Sub Category</div>
            </a>
          </li>

          <!-- Products-->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Products</span>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n="Layouts"> Products</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('product.create')}}" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Add Products</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="{{route('product')}}" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">All Products</div>
                </a>
              </li>

            </ul>
          </li>

          <!-- Order-->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Order</span>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n="Layouts"> Order</div>
            </a>

            <ul class="menu-sub">

              <li class="menu-item">
                <a href="{{route('order')}}" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Pending Orders</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="{{route('completeOrder')}}" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">Completed Orders</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="{{route('order')}}" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">Cancel Orders</div>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="bx bx-menu bx-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search bx-md"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto border-rounded">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="#" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online"><i class="bx bx-user bx-md me-3"></i>
                            <!-- <img src="#" alt class="w-px-40 h-auto rounded-circle" />  -->
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">{{Auth::user()->name}}</h6>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                      <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('profile.edit')}}"> <i
                        class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                      </a>
                    </form>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">

            @yield('main')
          </div>

          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link">Abu Salah Musha Lemon</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashboards/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboards/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboards/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dashboards/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashboards/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashboards/assets/js/main.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('dataTable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dataTable/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.searchBuilder.min.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.dateTime.min.js') }}"></script>
    <script src="{{ asset('dataTable/jszip.min.js') }}"></script>
    <script src="{{ asset('dataTable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dataTable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dataTable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dataTable/pdfmake.1.36.min.js') }}"></script>

    <!-- Custom JS -->
    <!-- <script src="{{ asset('dataTable/jquery-3.7.1.min.js') }}"></script> -->
    <script src="{{ asset('customcssjs/toster.min.js') }}"></script>

    <!-- Toastr Notifications -->
    <script>
      $(document).ready(function () {
        @if (Session:: has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
        case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;
        case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;
        case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;
        case 'danger':
        case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
      }
      @endif
});
    </script>

    <!-- Page JS -->
    <script src="{{ asset('dashboards/assets/js/dashboardss-analytics.js') }}"></script>

    <!-- GitHub Widget -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- DataTable Initialization -->
    <script>
      function initializeDataTable(columnNames) {
        var table;
        if ($.fn.dataTable.isDataTable('#dataTable')) {
          table = $('#dataTable').DataTable();
        } else {
          table = $('#dataTable').DataTable({
            paging: false,
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                text: 'Print',
                customize: function (win) {
                  $(win.document.body).find('h1').text('Stock Genie');
                  $(win.document.body).prepend('<img src="./images/logo/StockGenie.png" style="width:80px;height:80px;display:block;margin:auto;"/>');
                  $(win.document.body).append('<a href="http://www.StockGenie.com" style="color:#007bff;">Visit our website: Stock Genie</a>');
                },
                exportOptions: {
                  columns: function (idx, data, node) {
                    return columnNames.includes($(node).text().trim());
                  }
                }
              },
              {
                extend: 'excelHtml5',
                text: 'Excel',
                exportOptions: {
                  columns: function (idx, data, node) {
                    return columnNames.includes($(node).text().trim());
                  }
                }
              },
              {
                extend: 'pdfHtml5',
                text: 'PDF',
                exportOptions: {
                  columns: function (idx, data, node) {
                    return columnNames.includes($(node).text().trim());
                  }
                },
                customize: function (doc) {
                  doc.content.splice(0, 0, {
                    text: 'Stock Genie',
                    fontSize: 20,
                    bold: true,
                    margin: [0, 0, 0, 12]
                  });
                  doc.content.push({
                    text: 'Visit our website: Stock Genie',
                    link: 'http://www.StockGenie.com',
                    color: '#007bff'
                  });
                  doc.defaultStyle.font = 'Roboto';
                  doc.styles = {
                    Roboto: {
                      normal: 'Roboto-Regular.ttf',
                      bold: 'Roboto-Bold.ttf',
                      italics: 'Roboto-Italic.ttf',
                      bolditalics: 'Roboto-BoldItalic.ttf'
                    }
                  };
                }
              }
            ]
          });
        }
      }
    </script>

    <!-- Image Preview -->
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#image').attr('src', e.target.result)
              .width(190)
              .height(190)
              .css('border-radius', '16px'); // Adding border-radius
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>

    @yield('script') <!-- Additional scripts can be added here -->


</body>

</html>