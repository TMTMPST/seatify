<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seatify</title>
</head>
<body>
    @include('components.navbar')
    <div class="">
        @yield('content')
    </div>
    @include('components.footer')
    <script src="{{'js/detailConcert.js'}}"></script>
    <script src="{{'js/buyTickets.js'}}"></script>
    <script src="{{'js/testimoni.js'}}"></script>
    <script src="{{'js/faq.js'}}"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
