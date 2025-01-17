<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Muestra</title>
</head>

<body>
    <form action="{{ route('interpretar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="texto">Texto</label>
        <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
        <input type="hidden" name="id_muestra" value="{{ $muestra->id }}">
        <select name="id_interpretacion" id="id_interpretacion">
            <@foreach ($interpretaciones as $interpretacion)
                <option value="{{ $interpretacion->id }}">{{ $interpretacion->clave }}</option>
            @endforeach
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>