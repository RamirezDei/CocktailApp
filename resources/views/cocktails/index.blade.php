<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cócteles</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</head>
<body class="container mt-5">
    <h2 class="text-center">🍹 Lista de Cócteles</h2>
    
    <!-- Botón para ir a la lista de cócteles guardados -->
    <div class="text-center mb-4">
        <a href="{{ url('/saved') }}" class="btn btn-secondary">Ver Cócteles Guardados</a>
    </div>

    <!-- Alerta de éxito con SweetAlert2 -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <div class="row">
        @foreach($cocktails as $cocktail)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                    <form method="POST" action="{{ url('/save') }}">
                        @csrf
                        <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                        <input type="hidden" name="image" value="{{ $cocktail['strDrinkThumb'] }}">
                        <button type="submit" class="btn btn-primary">Guardar Cóctel</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
