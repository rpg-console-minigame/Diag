<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Carga Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dropdown-menu .dropdown-menu {
            position: absolute;
            top: 30%;
            right: 100%;
            margin-top: -5px;
        }


        .dropdown-menu li:hover>.dropdown-menu {
            display: block;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            max-width: 1000px;
            padding: 20px;
            margin: auto;
        }

        .muestra {
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .muestra:hover {
            transform: translateY(-5px);
        }

        .muestra img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .btnMuestra {
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            transition: 20s ease;
            background-color: #333;
            color: #fff;
        }

        :root {
            --medac-light-blue: #0374b5;
            --medac-white: #FFFFFF;
            --medac-oscuro: #102f4b;
        }

        .lightMedac {
            color: var(--medac-light-blue);
        }

        .whiteMedac {
            color: var(--medac-white);
        }

        .oscuroMedac {
            background-color: var(--medac-oscuro);
        }

        /* aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa */

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #102f4b, #1c4966);
            color: white;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
            font-size: 1.25rem;
        }

        .table th {
            background-color: #dee2e6;
            font-weight: 600;
        }

        .btn-custom {
            background-color: #102f4b;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #1c4966;
            transform: translateY(-2px);
            color: white;
        }

        .img-fluid {
            border-radius: 10px;
            max-height: 250px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
            color: #102f4b;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background: var(--medac-oscuro);
            color: white;
            min-height: 100vh;
            padding: 20px;
            width: 200px;
        }

        .sidebar a {
            color: white;
            font-weight: bold;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            color: var(--medac-accent);
            transform: scale(1.1);
        }
    </style>

</head>


<body class="d-flex flex-column vh-100 bg-light">
    <header class="bg-white shadow p-3 header">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="https://instituto.medac.es/build/images/medac-logo-azul-con-letras.svg"  alt="Logo" style="width: 100px;">
            <h3 class="m-0">Detalles de las Muestras</h3>
        </div>
    </header>

    <div class="d-flex flex-grow-1">

        <aside class="sidebar col-md-3">
                <h4>{{ Auth::user()->name ?? 'Usuario' }}</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{route('welcome')}}" class="nav-link">Muestras</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link">Perfil</a></li>
                    @if (session("user")->is_admin)
                        <li class="nav-item mb-2"><a href="{{route('usuarios')}}" class="nav-link">Usuarios</a></li>
                    @endif
                    <li class="nav-item mb-2"><a href="{{route('logout')}}" class="nav-link">Cerrar Sesión</a></li>
                </ul>
        </aside>

        <main class="flex-grow-1 p-4">

            <div class="container py-5">

                <h1 class="text-center mb-4">Detalles de la Muestra</h1>
 
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- Botón para abrir el modal -->
                    <button class="btn oscuroMedac text-white p-4" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button>
                    <a class="btn oscuroMedac text-white p-4" href="{{ route('borrarMuestra', $muestra->id) }}">Borrar</a>
                </div><br>
                
                <!-- Modal de edición -->
                <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModalLabel">Editar Muestra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario de edición -->
                                <form action="{{ route('actualizarMuestra', $muestra->id) }}" method="POST">
                                    @csrf
                                
                                    <!-- Tipo de Estudio -->
                                    <div class="form-group">
                                        <label for="tipo_estudio">Tipo de Estudio:</label>
                                        <select class="form-control" name="tipo_estudio_id" id="tipo_estudio" required>
                                            @foreach ($tEstudios as $tipoEstudio)
                                                <option value="{{ $tipoEstudio->id }}" {{ $muestra->tipo_estudio_id == $tipoEstudio->id ? 'selected' : '' }}>
                                                    {{ $tipoEstudio->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <!-- Descripción Calidad -->
                                    <div class="form-group">
                                        <label for="textoCalidad">Descripción Calidad:</label>
                                        <input type="text" class="form-control" name="textoCalidad" id="textoCalidad" placeholder="Texto Calidad" value="{{ old('textoCalidad', $muestra->textoCalidad) }}" required>
                                    </div>
                                
                                    <!-- Calidad -->
                                    <div class="form-group">
                                        <label for="calidad">Calidad:</label>
                                        <select class="form-control" name="calidad_id" id="calidad" required>
                                            @foreach ($calidades as $calidad)
                                                <option value="{{ $calidad->id }}" data-tipo-estudio="{{ $calidad->tipo_estudio_id }}"
                                                    {{ $muestra->calidad_id == $calidad->id ? 'selected' : '' }}>
                                                    {{ $calidad->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <!-- Descripción -->
                                    <div class="form-group">
                                        <label for="description">Descripción:</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Descripción" value="{{ old('description', $muestra->descripcion) }}" required>
                                    </div>
                                
                                    <!-- Muestra -->
                                    <div class="form-group">
                                        <label for="muestra">Selecciona una muestra:</label>
                                        <select class="form-control" name="muestra_id" id="muestra" required>
                                            @foreach ($fMuestras as $fMuestra)
                                                <option value="{{ $fMuestra->id }}" {{ $muestra->muestra_id == $fMuestra->id ? 'selected' : '' }}>
                                                    {{ $fMuestra->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <!-- Naturaleza -->
                                    <div class="form-group">
                                        <label for="naturaleza">Tipo de Naturaleza:</label>
                                        <select class="form-control" name="tipo_naturaleza_id" id="naturaleza" required>
                                            @foreach ($tNaturalezas as $tNaturaleza)
                                                <option value="{{ $tNaturaleza->id }}" {{ $muestra->tipo_naturaleza_id == $tNaturaleza->id ? 'selected' : '' }}>
                                                    {{ $tNaturaleza->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                


                <div class="card mb-4">
                    <div class="card-header text-center">Información General</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered  text-center">
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


                @if ($muestra->imagen)
                    <div class="card mb-4">
                        <div class="card-header text-center bg-primary text-white">
                            <h5 class="mb-0">Imagen de la Muestra</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-row gap-3 overflow-auto p-2" style="white-space: nowrap;">
                                @foreach ($muestra->imagen as $imagen)
                                    <div class=" text-center" style="min-width: 250px; max-width: 250px;">
                                        <img src="{{ asset('uploads/' . $imagen->link) }}" alt="Imagen de la muestra" class="card-img-top img-fluid">
                                        <div class="card-body">
                                            <p class="card-text"><strong>Aumento:</strong> {{ $imagen->aumento }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif


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
                                    <a href="{{ route('interpretacionBorrar', $interpretacion->id) }}"> borrar</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                


                {{-- <div class="d-grid">
                    <a class="btn btn-custom" href="{{ route('interpretar', $muestra)}}">Interpretar Muestra</a>
                </div> --}}

                

                <!-- Botón para abrir el modal -->
                <div class="d-grid">
                    <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#interpretarModal">
                        Modal Muestra
                    </button>
                </div>

                <!-- Modal de Interpretación -->
                <div class="modal fade" id="interpretarModal" tabindex="-1" aria-labelledby="interpretarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="interpretarModalLabel">Formulario de Interpretación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario de Interpretación -->
                                <form action="{{ route('interpretarenter') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Texto -->
                                    <div class="form-group">
                                        <label for="texto" class="form-label">Texto</label>
                                        <textarea class="form-control" name="texto" id="texto" cols="30" rows="5" placeholder="Ingresa el texto aquí..." required></textarea>
                                    </div>

                                    <!-- ID Muestra -->
                                    <input type="hidden" name="id_muestra" value="{{ $muestra->id }}">

                                    <!-- Interpretación -->
                                    <div class="form-group">
                                        <label for="id_interpretacion" class="form-label">Clave de Interpretación</label>
                                        <select class="form-control" name="id_interpretacion" id="id_interpretacion" required>
                                            @foreach ($interpretacion_texto as $interpretacion)
                                                <option value="{{ $interpretacion->id }}">{{ $interpretacion->clave }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="btn btn-submit btn-block mt-4">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <button class="btn btn-outline-secondary" onclick="window.print()">
                <i class="bi bi-printer"></i> Imprimir
            </button>

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
