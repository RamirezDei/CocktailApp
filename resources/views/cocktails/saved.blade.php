<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cócteles Guardados</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table img {
            border-radius: 8px;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        /* Botón Editar mejorado */
        .btn-primary {
            background-color: #28a745;
            border: none;
            border-radius: 50px; /* Borde redondeado */
            padding: 10px 25px;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            background-color: #218838;
            transform: translateY(-3px); /* Efecto de elevación */
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">🍸 Cócteles Guardados</h2>

        <!-- Botón para volver a la página principal de guardar cócteles -->
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a Guardar Cócteles</a>
        </div>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        <table id="cocktailTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cocktails as $cocktail)
                <tr>
                    <td>{{ $cocktail->name }}</td>
                    <td><img src="{{ $cocktail->image }}" width="100"></td>
                    <td>
                        <!-- Botón Editar mejorado -->
                        <a href="{{ url('/cocktails/edit/'.$cocktail->id) }}" class="btn btn-primary">✏️ Editar</a>
                        <!-- Botón Eliminar -->
                        <form method="POST" action="{{ url('/delete/'.$cocktail->id) }}" class="delete-form" style="display:inline;">
                            @csrf
                            <button type="button" class="btn btn-danger delete-btn">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#cocktailTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron cócteles",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            $('.delete-btn').click(function(event) {
                event.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir esto.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
