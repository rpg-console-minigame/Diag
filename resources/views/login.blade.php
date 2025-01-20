<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>

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

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="{{ route('loginenter') }}" method="POST">
            @csrf
            <h2 class="text-center">Inicio de Sesión</h2>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
            </div>
            
            <!-- Password -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 (alternativo) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
