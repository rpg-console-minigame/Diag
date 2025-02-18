<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Muestra</title>

    <!-- Carga de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalización de colores y estilos */
        :root {
            --medac-light-blue: #0374b5;
            --medac-white: #FFFFFF;
            --medac-oscuro: #102f4b;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .table-responsive {
            max-width: 100%; /* Reduce el ancho de la tabla */
            margin: auto;
        }

        .table {
            font-size: 0.8rem; /* Reduce el tamaño del texto */
            table-layout: fixed; /* Fija el tamaño de la tabla */
            word-wrap: break-word; /* Asegura que el texto no se salga */
        }

        .table th, .table td {
            padding: 5px 8px; /* Reduce el espaciado */
            white-space: normal; /* Permite que el contenido haga saltos de línea */
            overflow-wrap: break-word; /* Rompe las palabras largas */
            text-overflow: ellipsis; /* Agrega "..." si el texto es muy largo */
            max-width: 150px; /* Ajusta el tamaño de cada celda */
        }




        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: var(--medac-white);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h3 {
            font-weight: bold;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: var(--medac-oscuro);
            color: var(--medac-white);
            font-weight: bold;
            text-align: center;
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
        }

        .table th {
            background-color: #dee2e6;
            font-weight: 600;
        }

        .btn-custom {
            background-color: var(--medac-oscuro);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-align: center;
        }

        .btn-custom:hover {
            background-color: #1c4966;
            transform: translateY(-2px);
        }

        .img-fluid {
            border-radius: 10px;
            max-height: 250px;
            width: 100%;
            object-fit: cover;
        }

        .list-group-item {
            border: none;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .list-group-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: var(--medac-oscuro);
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>

<body>

    <header class="header py-3">
        <div class="container">
            <img src="https://instituto.medac.es/build/images/medac-logo-azul-con-letras.svg" alt="Logo" style="width: 100px;">
            <h3 class="m-0">Detalles de las Muestras</h3>
        </div>
    </header>

    <main class="container py-5">
        <h1>Detalles de la Muestra</h1>

        <!-- Información General -->
        <div class="card mb-4">
            <div class="card-header">Información General</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Descripción</th>
                                <th>Formato</th>
                                <th>Sede</th>
                                <th>Tipo de Naturaleza</th>
                                <th>Calidad</th>
                                <th>Calidad Info</th>
                                <th>Usuario</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $muestra->descripcion }}</td>
                                <td>{{ $muestra->formato->nombre ?? 'No especificado' }}</td>
                                <td>{{ $muestra->sede->nombre ?? 'No especificada' }}</td>
                                <td>{{ $muestra->tipo_naturaleza->nombre ?? 'No especificado' }}</td>
                                <td>{{ $muestra->calidad->nombre ?? 'No especificada' }}</td>
                                <td>{{ $muestra->textoCalidad ?? 'No especificado' }}</td>
                                <td>{{ $muestra->user->name ?? 'No especificado' }}</td>
                                <td>{{ $muestra->created_at }}</td>
                                <td>{{ $muestra->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Imágenes de la Muestra -->
        @if ($muestra->imagen)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white text-center">Imagen de la Muestra</div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    @foreach ($muestra->imagen as $imagen)
                        <div class="text-center">
                            <img src="{{ asset('uploads/' . $imagen->link) }}"
                                alt="Imagen de la muestra"
                                class="img-fluid rounded"
                                style="max-width: 100%; height: auto;">
                            <p class="card-text mt-2"><strong>Aumento:</strong> {{ $imagen->aumento }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif



        <!-- Interpretaciones -->
        @if ($interpretaciones->count())
        <div class="card mb-4">
            <div class="card-header text-center">Interpretaciones</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($interpretaciones as $interpretacion)
                    <li class="list-group-item">
                        <p class="mb-1"><strong>Descripción:</strong> {{ $interpretacion->texto }}</p>
                        <p class="mb-1"><strong>Tipo:</strong> {{ $interpretacion->interpretacionInfo->texto}}</p>
                        <p class="mb-0"><strong>Creado:</strong> {{ $interpretacion->created_at }}</p>
                        <p></p>
                        <p></p>
                        <p></p>
                    </li>
                    @endforeach
                </ul>
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
