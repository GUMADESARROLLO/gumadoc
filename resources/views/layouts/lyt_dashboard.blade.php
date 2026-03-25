<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>GumaDocs | UNIMARK S,A</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link rel="manifest" href="{{ asset('falcon/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('falcon/assets/js/config.js') }}"></script>
    <script src="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href=" {{ asset('falcon/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('falcon/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('falcon/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('falcon/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- DataTables CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">
    <!-- CLASES PERSONALIZADAS GLOBALES -->
    <style>
        .daterangepicker td.active, .daterangepicker td.active:hover {
            background-color: #e7551f;
            border-color: transparent;
            color: #fff;
        }

        .daterangepicker td.in-range {
            background-color: #FCCCFC;
        }
        .daterangepicker {
            background-color: #1F2937;
            border: 1px solid #1F2937;
        }
        .daterangepicker .calendar-table {
            border: 1px solid #1F2937;
            background-color: #1F2937;
        }
        .daterangepicker.show-ranges.ltr .drp-calendar.left {
            border-left: 1px solid #1F2937;
        }
        .daterangepicker .calendar-table table {
            background-color: #1F2937;
        }
        .daterangepicker td.off, .daterangepicker td.off.in-range, .daterangepicker td.off.start-date, .daterangepicker td.off.end-date {
            background-color: #1F2937;
        }
        .input-fecha {
            height: 40px !important;
        }
        
    </style>
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
    
        @include('layouts.sidebar')
        <div class="content">
          @include('layouts.topbar')
          
          @yield('content')
          
          <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">Desarrollado por Grupo GUMA <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2026 &copy; <a href="https://gumacorp.com">GumaCorp</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v{{ env('APP_VERSION', '0.0.0') }}</p>
              </div>
            </div>
          </footer>
        </div>
        
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('falcon/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('falcon/vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('falcon/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('falcon/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('falcon/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('falcon/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('falcon/vendors/list.js/list.min.js ') }}"></script>
    <script src="{{ asset('falcon/assets/js/theme.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')

  </body>

</html>