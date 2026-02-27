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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ public_asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ public_asset('auth/css/app.css?v=1.2') }}" rel="stylesheet">
    <link href="{{ public_asset('auth/css/style.css?v=1.2') }}" rel="stylesheet">
    <link href="{{ public_asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .logo {
            width: 140px;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }

        .card-header .card-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header .card-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            font-size: 0.95rem;
            margin-top: 0.5rem;
        }

        .card-body {
            padding: 2.5rem;
        }

        .progress {
            height: 8px;
            border-radius: 10px;
            background: #e9ecef;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            transition: width 0.6s ease;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.4);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: #ffffff;
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            height: auto !important;
            padding: 0.5rem 1rem !important;
            background: #f9fafb !important;
        }

        .select2-container--default .select2-selection--single:focus,
        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #667eea !important;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1) !important;
            background: #ffffff !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 0 !important;
            line-height: 1.5 !important;
            color: #374151 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100% !important;
            right: 1rem !important;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .form-check {
            padding: 1rem;
            background: #f9fafb;
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .form-check:hover {
            border-color: #667eea;
            background: #f0fdf4;
        }

        .form-check-input {
            width: 1.25rem;
            height: 1.25rem;
            margin-top: 0.15rem;
            cursor: pointer;
            accent-color: #667eea;
        }

        .form-check-label {
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
            background: linear-gradient(135deg, #5a6fd6 0%, #6a4190 100%);
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.3);
            outline: none;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1.5rem 1.5rem 1rem;
            }

            .logo {
                width: 120px;
            }

            .form-control {
                padding: 0.75rem 0.875rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="text-center mb-3">
                <img src="{{ get_logo() }}" class="logo" alt="Logo">
            </div>
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ public_asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ public_asset('auth/js/script.js') }}"></script>
    <script src="{{ public_asset('backend/plugins/select2/js/select2.min.js') }}"></script>
    @yield('js-script')
    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%',
                dropdownParent: $('.card-body'),
                theme: 'default'
            });
        });
    </script>
</body>
</html>