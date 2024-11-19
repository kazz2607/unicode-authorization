<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $meta['title'] }} - {{ config('app.name', 'Laravel') }}</title>
    <!-- CSS files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/demo.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet"/>
    
  </head>
  <body >
    <!-- JS files -->
    <script src="{{ asset('assets/backend/js/demo-theme.min.js') }}"></script>
    <div class="page">
      <!-- Navbar -->
      <div class="sticky-top-fix">
        <div class="page-header">
          @include('backend.layouts.header')
        </div>
        <div class="page-navigation">
          @include('backend.layouts.nav')
        </div>
      </div>
      <div class="page-wrapper">
        <div class="page-content">
          @yield('content')
        </div>
        <div class="page-footer">
          @include('backend.layouts.footer')
        </div>
      </div>
    </div>
    <div class="modal-report">
      @include('backend.layouts.modal-report')
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('assets/backend/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('assets/backend/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('assets/backend/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/backend/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/backend/js/demo.min.js') }}" defer></script>
    <!-- Tabler Custom JS -->
    <script src="{{ asset('assets/backend/js/tabler-custom.js') }}" defer></script>
    <script src="{{ asset('assets/backend/js/custom.js') }}" defer></script>
  </body>
</html>