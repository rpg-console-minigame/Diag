<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optionally, Bootstrap 5 -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

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

    {{-- Lista de muestras --}}
    <div class="container mt-4">
        <h2 class="mb-4">Muestras</h2>
        <div class="row">
            @foreach ($muestras as $muestra)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Descripción: {{ $muestra->descripcion }}</h3>
                            <p class="card-text">Formato: {{ $muestra->formato->nombre }}</p>
                            <p class="card-text">Sede: {{ $muestra->sede->nombre }}</p>
                            <p class="card-text">Tipo de Naturaleza: {{ $muestra->tipo_naturaleza->nombre }}</p>
                            <p class="card-text">Calidad: {{ $muestra->calidad->nombre }}</p>
                        </div>
                    </div>
                    <a href="{{ route('muestra', ['id' => $muestra->id]) }}" class="btn btn-primary btn-block mt-2">Ver Detalles</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Optionally, Bootstrap 5 -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
