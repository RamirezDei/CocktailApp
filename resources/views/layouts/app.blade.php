<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('head')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        h2 {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            font-size: 1.25rem;
            color: #007bff;
            font-weight: bold;
            text-align: center;
        }
        .card-body {
            text-align: center;
        }
        .btn-primary {
            background-color: #28a745;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s;
            margin-bottom: 30px;
        }
        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 1200px;
        }
        .row {
            margin-bottom: 40px;
        }
        </style>
            @yield('styles')
</head>

    <body class="container mt-5">
    @auth
    <a href="{{ route('logout') }}" class='btn btn-danger'
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>
        <span>Salir</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endauth
        @yield('content')
    </body>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
</html>

