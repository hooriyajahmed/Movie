
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Online Movie Booking | Admin Panel</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{asset('Admin/css/adminlte.css')}}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('Admin/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />

    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <!--begin::Header-->
<nav class="app-header navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <!-- Sidebar Toggle -->

    <!-- Left Links: Home, Contact -->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link fw-medium text-primary" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fw-medium text-primary" href="#">Contact</a>
      </li>
    </ul>

    <!-- Right Navbar Items -->
    <ul class="navbar-nav ms-auto align-items-center">

      <!-- Go To Website Button -->
      <li class="nav-item me-3">
        <a href="{{ route('userindex') }}" class="btn btn-sm btn-primary text-white fw-bold">
          Go to Website
        </a>
      </li>

      <!-- Search Icon -->
      <li class="nav-item me-2">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="bi bi-search fs-5"></i>
        </a>
      </li>

      <!-- Messages Dropdown -->
      <li class="nav-item dropdown me-2">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-chat-text fs-5"></i>
          <span class="badge bg-danger rounded-pill">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <img src="{{asset('Admin/assets/img/user1-128x128.jpg')}}" class="rounded-circle me-3" width="40" alt="User">
              <div>
                <div class="fw-bold">Brad Diesel <small class="text-danger"><i class="bi bi-star-fill"></i></small></div>
                <div class="small text-muted">Call me whenever you can... • 4 Hours Ago</div>
              </div>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center text-primary" href="#">See All Messages</a></li>
        </ul>
      </li>

      <!-- Notifications Dropdown -->
      <li class="nav-item dropdown me-2">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-bell-fill fs-5"></i>
          <span class="badge bg-warning rounded-pill">15</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-header">15 Notifications</li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>4 new messages <span class="text-muted small float-end">3 mins</span></a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-people-fill me-2"></i>8 friend requests <span class="text-muted small float-end">12 hrs</span></a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-fill me-2"></i>3 new reports <span class="text-muted small float-end">2 days</span></a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center text-primary" href="#">See All Notifications</a></li>
        </ul>
      </li>

      <!-- User Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
          <img src="{{asset('Admin/assets/img/user2-160x160.jpg')}}" class="rounded-circle me-2" width="35" alt="User">
          <span class="d-none d-md-inline fw-medium">Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-header text-center">
            <img src="{{asset('Admin/assets/img/user2-160x160.jpg')}}" class="rounded-circle mb-2" width="70" alt="User">
            <p class="mb-0 fw-bold">Alexander Pierce</p>
            <small class="text-muted">Member since Nov. 2023</small>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-item d-flex justify-content-between">
            <a href="#">Profile</a>
            <a href="#" class="text-danger">Sign Out</a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
<!--end::Header-->

      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('Admin/assets/img/AdminLTELogo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Users
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('alluser')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Users</p>
                    </a>
                  </li>
                </ul>
              </li>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-bookmark"></i>
                  <p>
                    Categories
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('insertcategory')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('fetchcategory')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All categories</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-film"></i>
                  <p>
                    Movies
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('insertmovie')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Movies</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('fetchmovie')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Movies</p>
                    </a>
                  </li>
                </ul>
              </li>

                  <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-film"></i>
                  <p>
                    Trailers
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('addtrailer')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add trailer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('fetchtrailer')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All trailers</p>
                    </a>
                  </li>
                </ul>
              </li>

    <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-film"></i>
                  <p>
                    Booking
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('fetchmovie')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Booking</p>
                    </a>
                  </li>
                </ul>
              </li>










              <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link">
                  <i class="nav-icon bi bi-box-arrow-right"></i>
                  <p>Logout</p>
                  </a>
               </li>
                </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      @yield('admin')
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2025&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{asset('Admin/js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <!-- OPTIONAL SCRIPTS -->

    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>

    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>

    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>

    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>

    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>

    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
