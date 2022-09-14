<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    <!-- FontAwesome Icons --> 
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/fontawesome-icons.css"> 

    <!-- Themify Icons --> 
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/themify-icons.css"> 

    <!-- Bootstrap Icons --> 
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/bootstrap-icons.css"> 
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="../assets/css/dashlite.css?ver=3.0.0">
    <link id="skin-default" rel="stylesheet" href="../assets/css/theme.css?ver=3.0.0">


</head>
<body class="nk-body bg-white npc-default has-aside no-touch nk-nio-theme">
    @include('layouts.inc.navbar')
    @include('layouts.inc.sidebar')
        @yield('content')
    @include('layouts.inc.footer')

 <script src="../assets/js/bundle.js?ver=3.0.0"></script>
 <script src="../assets/js/scripts.js?ver=3.0.0"></script>
 <script src="../assets/js/charts/gd-default.js?ver=3.0.0"></script>
 <script src="../assets/js/libs/datatable-btns.js?ver=3.0.0"></script>
 
 
</body>
</html>