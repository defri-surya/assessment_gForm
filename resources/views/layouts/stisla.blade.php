<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BK &mdash; Tes</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap') }}/fontawsome.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('node_modules') }}/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{ asset('node_modules') }}/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="{{ asset('node_modules') }}/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="{{ asset('node_modules') }}/summernote/dist/summernote-bs4.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('layouts.include.navbar')


            @include('layouts.include.sidebar')

            <!-- Main Content -->
            @include('sweetalert::alert')
            @yield('content')


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> INOVASI DIGITAL NUSWANTARA
                </div>
                <div class="footer-right">
                    1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('jquery') }}/jquery.js"></script>
    <script src="{{ asset('jquery') }}/pooper.js"></script>
    <script src="{{ asset('jquery') }}/bootstrap.min.js"></script>
    <script src="{{ asset('jquery') }}/jquery.nicescol.min.js"></script>
    <script src="{{ asset('jquery') }}/moment.min.js"></script>
    <script src="{{ asset('assets') }}/js/stisla.js"></script>
    @yield('js')

    <!-- JS Libraies -->
    {{-- <script src="{{ asset('node_modules') }}/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="{{ asset('node_modules') }}/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('node_modules') }}/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="{{ asset('node_modules') }}/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="{{ asset('node_modules') }}/summernote/dist/summernote-bs4.js"></script>
  <script src="{{ asset('node_modules') }}/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}

    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets') }}/js/page/index-0.js"></script>
</body>

</html>
