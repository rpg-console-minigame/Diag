<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    {{-- div de bienvenida con los datos de session user --}}
    <div>
        <h1>Bienvenido/a {{ session('user')->getName() }}</h1>
        <h2>Correo: {{ session('user')->email }}</h2>
    </div>
    {{-- div foreach para mostrar todas las $muestras --}}
    {{-- protected $fillable = [
        'descripcion',
        'formato_muestra_id',
        'sede_id',
        'tipo_naturaleza_id',
        'calidad_id',
        'user_id'
    ]; --}}
    <div>
        <h2>Muestras</h2>
        @foreach ($muestras as $muestra)
            <div>
                <h3>Descripcion: {{ $muestra->descripcion }}</h3>
                <h4>Formato: {{ $muestra->formato_muestra_id }}</h4>
                <h4>Sede: {{ $muestra->sede_id }}</h4>
                <h4>Tipo de Naturaleza: {{ $muestra->tipo_naturaleza_id }}</h4>
                <h4>Calidad: {{ $muestra->calidad_id }}</h4>
                <h4>Usuario: {{ $muestra->user_id }}</h4>
            </div>
        @endforeach
</body>

</html>
