<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-token" content="{{ auth()->check() ? auth()->user()->api_token: '' }}">
    <meta name="user-id" content="{{ auth()->check() ? auth()->user()->id: '' }}">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Yijing</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AWoeQCFYVLzPdeXe6GyT0ImYx2_MGIwVDfaflPZrjY5K9Egizy53cYShq37g0M9u04q6zmyaqXPCoV50"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/metalogo.png') }}" type="image/png" sizes="16x16">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('partial.navigation')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
