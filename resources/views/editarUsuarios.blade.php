<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 0.5rem;
        }

        .btn-create {
            background-color: #28a745;
            color: white;
        }

        .btn-create:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>

<body>
    {{-- Header con datos del usuario y logout --}}
    <div class="container mt-4">
        <div class="header d-flex justify-content-between align-items-center">
            <div>
                <h1>Bienvenido/a {{ session('user')->getName() }}</h1>
                <h2>Correo: {{ session('user')->email }}</h2>
            </div>
            <div>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    {{-- Botón para crear nueva muestra --}}
    <div class="container mt-4">
        <div class="d-flex justify-content-end">
            <a href="{{ route('crearmuestra') }}" class="btn btn-create btn-lg">Crear Nueva Muestra</a>
        </div>
    </div>

    {{-- Botón editar usuario --}}
    

    {{-- Lista de muestras --}}
    <div class="container mt-4">
        <h2 class="mb-4">Usuarios</h2>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Nombre: {{ $user->name }}</h3>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <p class="card-text">Sede: {{ $user->sede->nombre }}</p>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="d-flex justify-content-end">
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarUsuarioModal">
                                Editar Usuario
                            </button>
                        </div>
                    </div>
                
                    <!-- Modal -->
                    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarUsuarioLabel">Editar Usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="nombreUsuario" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombreUsuario" placeholder="Introduce el nombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailUsuario" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="emailUsuario" placeholder="Introduce el correo">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
