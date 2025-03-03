<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Seatify</title>
</head>
<body>
    @if(auth()->check() && auth()->user()->level == 0)
        @include('components.header')
        <x-sidebar />
        <div class="p-6 sm:ml-64 mt-8">
            <div class="mt-10">
                @yield('admin')
            </div>
        </div>
    @else
        <script>window.location.href = "/";</script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
