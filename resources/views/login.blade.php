<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <form action="{{ route('loginenter') }}" method="POST">
        @csrf
        <h2>Inicio de Sesión</h2>
        <label for="email">Correo Electrónico</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Contraseña</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
