<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ get_favicon() }}">

    <title>{{ get_option('site_title', config('app.name')) }}</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ public_asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ public_asset('auth/css/app.css?v=1.2') }}" rel="stylesheet">
     <style>
        .logo{
            width: 70px;
            
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ public_asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ public_asset('auth/js/script.js') }}"></script>
	@stack('scripts')
</body>
</html>
