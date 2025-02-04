<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - MEDAC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .switch-container {
            display: flex;
            align-items: center;
        }
        .switch-container input {
            margin-right: 10px;
        }
        .login-btn {
            background-color: #002244;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-btn:hover {
            background-color: #003366;
        }
        .forgot-password {
            margin-top: 15px;
            display: block;
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>MEDAC</h1>
        <p>Instituto Oficial de Formación Profesional</p>
        <form action="{{ route('loginenter') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputUsername">Usuario</label>
                <input type="text" id="inputUsername" name="username" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" id="inputPassword" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group switch-container">
                <label for="inputRememberMe">Recordarme en este equipo</label>
            </div>
            <button type="submit" class="login-btn">Iniciar Sesión</button>
            <a class="forgot-password" href="/cuenta/solicitar-password">¿Has olvidado tu contraseña?</a>
        </form>
    </div>
</body>
</html>
