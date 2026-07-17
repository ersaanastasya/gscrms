<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'GSCRMS')
    </title>

    <link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-light">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="container-fluid py-4">

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @stack('scripts')
    @push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const mapElement = document.getElementById('worldMap');

    if (!mapElement) return;

    const map = L.map('worldMap').setView([20, 0], 2);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '&copy; OpenStreetMap Contributors'
        }
    ).addTo(map);

});

</script>

@endpush

</body>

</html>