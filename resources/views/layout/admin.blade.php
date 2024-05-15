<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
    <title>Coda Music Store | {{ Request::segment(1) === null ? 'Shop' : ucwords(Request::segment(1)) }} </title>
    @include('layout.links')
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
</head>
<body>
    @yield('admin-main')
    @include('layout.scripts')
    <script src="{{ asset('assets/admin/script.js') }}"></script>
</body>

</html>
