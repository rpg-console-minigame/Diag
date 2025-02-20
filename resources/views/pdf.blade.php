<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Muestra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        h1 {
            color: #102f4b;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .card-header {
            background-color: #102f4b;
            color: white;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }
        .card-body {
            padding: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .img-fluid {
            max-width: 60%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .list-group-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            page-break-inside: avoid;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://instituto.medac.es/build/images/medac-logo-azul-con-letras.svg" alt="Logo" class="logo">
        <h1>Detalles de la Muestra</h1>
    </div>

    <div class="card">
        <div class="card-header">Información General</div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Descripción</th>
                    <td>{{ $muestra->descripcion }}</td>
                </tr>
                <tr>
                    <th>Formato</th>
                    <td>{{ $muestra->formato->nombre ?? 'No especificado' }}</td>
                </tr>
                <tr>
                    <th>Sede</th>
                    <td>{{ $muestra->sede->nombre ?? 'No especificada' }}</td>
                </tr>
                <tr>
                    <th>Tipo de Naturaleza</th>
                    <td>{{ $muestra->tipo_naturaleza->nombre ?? 'No especificado' }}</td>
                </tr>
                <tr>
                    <th>Calidad</th>
                    <td>{{ $muestra->calidad->nombre ?? 'No especificada' }}</td>
                </tr>
                <tr>
                    <th>Calidad Info</th>
                    <td>{{ $muestra->textoCalidad ?? 'No especificado' }}</td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td>{{ $muestra->user->name ?? 'No especificado' }}</td>
                </tr>
                <tr>
                    <th>Creado</th>
                    <td>{{ $muestra->created_at }}</td>
                </tr>
                <tr>
                    <th>Actualizado</th>
                    <td>{{ $muestra->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>

        <!-- Imágenes de la Muestra -->
        @if ($muestra->imagen)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white text-center">Imagen de la Muestra</div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center"> 
                    @foreach ($muestra->imagen as $imagen)
                        <div class="text-center">
                            <img src="{{ public_path('uploads/' . $imagen->link) }}" 
                                alt="Imagen de la muestra" 
                                class="img-fluid rounded" 
                                style="max-width: 100%; height: auto;">
                            <p class="card-text mt-2"><strong>Aumento:</strong> {{ $imagen->aumento }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    @if ($interpretaciones->count())
        <div class="card">
            <div class="card-header">Interpretaciones</div>
            <div class="card-body">
                @foreach($interpretaciones as $interpretacion)
                    <div class="list-group-item">
                        <p><strong>Descripción:</strong> {{ $interpretacion->texto }}</p>
                        <p><strong>Tipo:</strong> {{ $interpretacion->interpretacionInfo->texto }}</p>
                        <p><strong>Creado:</strong> {{ $interpretacion->created_at }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Botón de acción (opcional) -->
        {{-- <div class="d-grid">
            <a class="btn btn-custom" href="{{ route('interpretar', $muestra)}}">Interpretar Muestra</a>
        </div> --}}
                


                {{-- <div class="d-grid">
                    <a class="btn btn-custom" href="{{ route('interpretar', $muestra)}}">Interpretar Muestra</a>
                </div> --}}
            </div>

        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoEstudioSelect = document.getElementById('tipo_estudio');
            const calidadSelect = document.getElementById('calidad');
            const opcionesOriginales = Array.from(calidadSelect.options);
    
            tipoEstudioSelect.addEventListener('change', function () {
                const selectedTipoEstudio = this.value;
                calidadSelect.innerHTML = '';
    
                opcionesOriginales.forEach(opcion => {
                    if (!opcion.dataset.tipoEstudio || opcion.dataset.tipoEstudio === selectedTipoEstudio) {
                        calidadSelect.appendChild(opcion);
                    }
                });
            });
    
            tipoEstudioSelect.dispatchEvent(new Event('change'));
        });
    </script>
    
</body>
</html>
