<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Laravel Backend</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body id="app">
      @include('layouts.backend.partials.top-menu')

      @include('layouts.backend.partials.header')

      @yield('content')


      <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>