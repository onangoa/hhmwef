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

        .card-signin {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
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

        .invalid-feedback {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .custom-control-input {
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
            accent-color: #667eea;
        }

        .custom-control-label {
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

        .btn-link {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-link:hover {
            color: #5a6fd6;
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            font-weight: 500;
        }

        .alert-danger {
            background: #fef2f2;
            color: #dc2626;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.15);
        }

        .alert-success {
            background: #f0fdf4;
            color: #16a34a;
            box-shadow: 0 2px 8px rgba(22, 163, 74, 0.15);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-signin {
                padding: 1.5rem;
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
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ public_asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ public_asset('auth/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
