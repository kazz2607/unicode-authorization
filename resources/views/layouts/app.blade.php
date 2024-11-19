<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/demo.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet"/>
  </head>
  <body  class=" d-flex flex-column">
    <!-- JS files -->
    <script src="{{ asset('assets/backend/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        @yield('content')
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/backend/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/backend/js/demo.min.js') }}" defer></script>
  </body>
</html>