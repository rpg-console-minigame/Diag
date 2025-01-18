<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="{{ route('registroenter') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Formulario de Registro</h2>
        <label for="name">Nombre</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Correo Electrónico</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Contraseña</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="repassword">Repetir Contraseña</label><br>
        <input type="password" id="repassword" name="repassword" required><br><br>

        <select name="sede_id" id="sede">
            @foreach ($sedes as $sede)
                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
