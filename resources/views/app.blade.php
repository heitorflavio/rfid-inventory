<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <!-- Styles -->
    <script src="{{asset('plugins/AdminLTE-3.2.0/plugins/jquery/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0/dist/css/adminlte.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('plugins\AdminLTE-3.2.0\plugins\fontawesome-free\css\all.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}"> -->

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

 <!-- Javascript -->
 <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/freelancer.js')}}"></script> -->
<script src="{{asset('plugins/AdminLTE-3.2.0/dist/js/adminlte.js')}}"></script>
<script src="{{asset('plugins/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- <script src="{{asset('plugins/AdminLTE-3.2.0/plugins/toastr/toastr.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.min.js')}}"></script> -->
</html>