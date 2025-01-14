<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Muestra</title>
</head>
<body>
    <form action="{{ route('guardar') }}" method="POST">
        @csrf
        
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" placeholder="Descripción">

        <label for="muestra">Selecciona una muestra:</label>
        <select name="muestra_id" id="muestra">
            @foreach ($muestra as $mues)
                <option value="{{ $mues->id }}">{{ $mues->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
