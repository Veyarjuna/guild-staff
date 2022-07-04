<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{url('/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{url('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{url('/assets/images/favicon.svg')}}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <input type="text" value="{{env('LINK_API')}}" id="api_link" hidden>
    <div id="app">
        @include('components.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')

            @include('components.footer')
        </div>
    </div>
    <script src="{{url('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/assets/vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{url('/assets/js/pages/form-element-select.js')}}"></script>
    {{-- <script src="{{url('/assets/vendors/apexcharts/apexcharts.js')}}"></script> --}}
    <script src="{{url('/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{url('/assets/js/mazer.js')}}"></script>
</body>

</html>