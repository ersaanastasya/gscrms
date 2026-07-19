<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>

        @yield('title', 'GSCRMS')

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-light">

    <div class="container-fluid">

        <div class="row justify-content-center align-items-center"
             style="min-height:100vh;">

            <div class="col-xl-4 col-lg-5 col-md-7 col-sm-10">

                @yield('content')

            </div>

        </div>

    </div>

    @stack('scripts')

</body>

</html>