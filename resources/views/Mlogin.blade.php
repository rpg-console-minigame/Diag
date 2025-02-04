<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Medac</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>

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
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            background-color:rgb(234, 239, 243);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #003366;
            text-align: center;
            font-weight: bold;
        }

        .form-group label {
            color: #003366;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #003366;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border-width: 0 0 1px;
        }

        .form-control:focus {
            border-color: #003366;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .btn-primary {
            background-color: #002e4c; 
            border: none;
            border-radius: 10px;    
            padding: 10px;
            font-weight: bold;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #003366;
        }

        .btn-primary:focus {
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }
        .input-container {
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid black;
            border-width: 0 0 1px;
            background-color: white;
        }

        input {
            padding: 8px;
            font-size: 16px;
            border: none;
            background-color: white;
        }
</style>
</style>
    </style>
</head>
<body>
    <div class="login-container">
    <h1 class="text-center">MEDAC</h1>
    <p class="text-center">Instituto Oficial de Formación Profesional</p>
        <form action="{{ route('loginenter') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email"><span class="material-symbols-outlined">mail</span></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            
            <div class="form-group">
                <label for="password"><span class="material-symbols-outlined">vpn_key</span></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <span class="material-symbols-outlined">mail</span>
                <input type="text" name="username" id="username" class="form-control" placeholder="Usuario">
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
        </form>
    </div>

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>