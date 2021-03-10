<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"/>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    </head>
    <body style='background:#ffe6e6'>
    <!-- id="app"  take from  el: '#app', in app.js -->
    <div id="app">


   

    <router-view></router-view> 

      
     </div>


       <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
