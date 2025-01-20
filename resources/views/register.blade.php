<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 (alternativo) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .register-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form action="{{ route('registroenter') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">Formulario de Registro</h2>
            
            <!-- Nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ingresa tu nombre" required>
            </div>
            
            <!-- Correo Electrónico -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
            </div>
            
            <!-- Contraseña -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            
            <!-- Repetir Contraseña -->
            <div class="form-group">
                <label for="repassword">Repetir Contraseña</label>
                <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Repite tu contraseña" required>
            </div>
            
            <!-- Selección de Sede -->
            <div class="form-group">
                <label for="sede">Sede</label>
                <select name="sede_id" id="sede" class="form-control" required>
                    @foreach ($sedes as $sede)
                        <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Botón de Enviar -->
            <button type="submit" class="btn btn-primary btn-block mt-3">Registrarse</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 (alternativo) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
