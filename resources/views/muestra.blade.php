<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Muestra</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Detalles de la Muestra</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Descripción:</strong> {{ $muestra->descripcion }}</p>
                <p class="card-text"><strong>Formato de Muestra:</strong> {{ $muestra->formato->nombre ?? 'No especificado' }}</p>
                <p class="card-text"><strong>Sede:</strong> {{ $muestra->sede->nombre ?? 'No especificada' }}</p>
                <p class="card-text"><strong>Tipo de Naturaleza:</strong> {{ $muestra->tipo_naturaleza->nombre ?? 'No especificado' }}</p>
                <p class="card-text"><strong>Calidad:</strong> {{ $muestra->calidad->nombre ?? 'No especificada' }}</p>
                <p class="card-text"><strong>Usuario:</strong> {{ $muestra->user->name ?? 'No especificado' }}</p>
                <p class="card-text"><strong>Creado:</strong> {{ $muestra->created_at }}</p>
                <p class="card-text"><strong>Actualizado:</strong> {{ $muestra->updated_at }}</p>
            </div>
        </div>
        @if($muestra->imagen)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Imagen de la Muestra</h5>
                    <img src="{{ asset('uploads/' . $muestra->imagen->link) }}" alt="Imagen de la muestra" class="img-fluid">
                    <p class="card-text mt-2"><strong>Aumento:</strong> {{ $muestra->imagen->aumento }}</p>
                </div>
            </div>
        @endif
        {{-- div de interpretaciones $interpretaciones --}}
        @if($interpretaciones->count())
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Interpretaciones</h5>
                    <ul class="list-group list-group-flush">
                        @foreach($interpretaciones as $interpretacion)
                            <li class="list-group-item">
                                <p class="card-text"><strong>Descripción:</strong> {{ $interpretacion->texto }}</p>
                                <p class="card-text"><strong>Tipo:</strong> {{ $interpretacion->interpretacionInfo->texto}}</p>
                                <p class="card-text"><strong>Creado:</strong> {{ $interpretacion->created_at }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {{-- boton enlace a interpretar --}}
        <a href="{{ route('interpretar', $muestra)}}" class="btn btn-primary mt-4">Interpretar Muestra</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

