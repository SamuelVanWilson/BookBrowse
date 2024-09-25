<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/flasher/flasher-notyf.min.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js'])
</head>
<body>
<x-navbar>{{ $title }}</x-navbar>
    {{ $slot }}
<x-footer></x-footer>
@if (session('success'))
    <script>
        notyf().success("{{ session('success') }}");
    </script>
@endif

@if(session('error'))
    <script>
        notyf().error("{{ session('error') }}");
    </script>
@endif
<script src="{{ asset('vendor/flasher/flasher-notyf.min.js') }}"></script>
</body>
</html>