@extends('adminlte::page')

@section('title', 'Detalles de la Muestra')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-vial mr-2"></i>Detalles de la Muestra</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card mb-4 hover-shadow-lg accion">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Información General</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-align-left mr-2"></i>Descripción</th>
                                        <th><i class="fas fa-file-alt mr-2"></i>Formato</th>
                                        <th><i class="fas fa-map-marker-alt mr-2"></i>Sede</th>
                                        <th><i class="fas fa-atom mr-2"></i>Tipo de Naturaleza</th>
                                        <th><i class="fas fa-star mr-2"></i>Calidad</th>
                                        <th><i class="fas fa-info mr-2"></i>Calidad Info</th>
                                        <th><i class="fas fa-user mr-2"></i>Usuario</th>
                                        <th><i class="fas fa-calendar-plus mr-2"></i>Creado</th>
                                        <th><i class="fas fa-calendar-check mr-2"></i>Actualizado</th>
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
                    <div class="card mb-4 hover-shadow-lg accion">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-image mr-2"></i>Imagen de la Muestra</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-nowrap overflow-auto">
                                @foreach ($muestra->imagen as $imagen)
                                    <div class="mr-3" style="min-width: 250px;">
                                        <img src="{{ asset('uploads/' . $imagen->link) }}" alt="Imagen de la muestra" class="img-fluid rounded" style="max-height: 200px; width: auto;">
                                        <p class="text-center mt-2"><strong><i class="fas fa-search-plus mr-2"></i>Aumento:</strong> {{ $imagen->aumento }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                {{-- AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII --}}

                @if ($interpretaciones->count())
                    <div class="card mb-4 hover-shadow-lg accion">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-comment-alt mr-2"></i>Interpretaciones</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($interpretaciones as $interpretacion)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-1"><strong><i class="fas fa-align-left mr-2"></i>Descripción:</strong> {{ $interpretacion->texto }}</p>
                                            <p class="mb-1"><strong><i class="fas fa-tag mr-2"></i>Tipo:</strong> {{ $interpretacion->interpretacionInfo->texto}}</p>
                                            <p class="mb-0"><strong><i class="fas fa-calendar-alt mr-2"></i>Creado:</strong> {{ $interpretacion->created_at }}</p>
                                        </div>
                                        <a href="{{ route('interpretacionBorrar', $interpretacion->id) }}" class="papelera bg-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="contenedor-botones">
                    <button class="botones" type="button" data-toggle="modal" data-target="#interpretarModal">
                        <i class="fas fa-comment-medical mr-2"></i> Interpretar Muestra
                    </button>
                    <a href="{{route('pdf' , $muestra->id) }}" class="botones bg-secondary">
                        <i class="fas fa-file-pdf mr-2"></i> Imprimir
                    </a>
                    <button class="botones bg-info" data-toggle="modal" data-target="#editarModal">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </button>
                    <a href="{{ route('borrarMuestra', $muestra->id) }}" class="botones bg-danger">
                        <i class="fas fa-trash-alt mr-2"></i> Borrar
                    </a>
                </div>

                <!-- Modal de edición -->
                <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModalLabel"><i class="fas fa-edit mr-2"></i>Editar Muestra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('actualizarMuestra', $muestra->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="tipo_estudio"><i class="fas fa-book mr-2"></i>Tipo de Estudio:</label>
                                        <select class="form-control" name="tipo_estudio_id" id="tipo_estudio" required>
                                            @foreach ($tEstudios as $tipoEstudio)
                                                <option value="{{ $tipoEstudio->id }}" {{ $muestra->tipo_estudio_id == $tipoEstudio->id ? 'selected' : '' }}>
                                                    {{ $tipoEstudio->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="textoCalidad"><i class="fas fa-info-circle mr-2"></i>Descripción Calidad:</label>
                                        <input type="text" class="form-control" name="textoCalidad" id="textoCalidad" value="{{ old('textoCalidad', $muestra->textoCalidad) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="calidad"><i class="fas fa-star mr-2"></i>Calidad:</label>
                                        <select class="form-control" name="calidad_id" id="calidad" required>
                                            @foreach ($calidades as $calidad)
                                                <option value="{{ $calidad->id }}" data-tipo-estudio="{{ $calidad->tipo_estudio_id }}"
                                                    {{ $muestra->calidad_id == $calidad->id ? 'selected' : '' }}>
                                                    {{ $calidad->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"><i class="fas fa-align-left mr-2"></i>Descripción:</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $muestra->descripcion) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="muestra"><i class="fas fa-flask mr-2"></i>Selecciona una muestra:</label>
                                        <select class="form-control" name="muestra_id" id="muestra" required>
                                            @foreach ($fMuestras as $fMuestra)
                                                <option value="{{ $fMuestra->id }}" {{ $muestra->muestra_id == $fMuestra->id ? 'selected' : '' }}>
                                                    {{ $fMuestra->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="naturaleza"><i class="fas fa-atom mr-2"></i>Tipo de Naturaleza:</label>
                                        <select class="form-control" name="tipo_naturaleza_id" id="naturaleza" required>
                                            @foreach ($tNaturalezas as $tNaturaleza)
                                                <option value="{{ $tNaturaleza->id }}" {{ $muestra->tipo_naturaleza_id == $tNaturaleza->id ? 'selected' : '' }}>
                                                    {{ $tNaturaleza->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="botones"><i class="fas fa-save mr-2"></i>Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Interpretación -->
                <div class="modal fade" id="interpretarModal" tabindex="-1" aria-labelledby="interpretarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="interpretarModalLabel"><i class="fas fa-comment-medical mr-2"></i>Formulario de Interpretación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('interpretarenter') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="texto"><i class="fas fa-align-left mr-2"></i>Texto</label>
                                        <textarea class="form-control" name="texto" id="texto" rows="5" placeholder="Ingresa el texto aquí..." required></textarea>
                                    </div>
                                    <input type="hidden" name="id_muestra" value="{{ $muestra->id }}">
                                    <div class="form-group">
                                        <label for="id_interpretacion"><i class="fas fa-key mr-2"></i>Clave de Interpretación</label>
                                        <select class="form-control" name="id_interpretacion" id="id_interpretacion" required>
                                            @foreach ($interpretacion_texto as $interpretacion)
                                                <option value="{{ $interpretacion->id }}">{{ $interpretacion->clave }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="botones"><i class="fas fa-paper-plane mr-2"></i>Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .card {
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        margin-bottom: 1rem;
    }
    .card-header {
        background-color: #102f4b;
        border-bottom: 1px solid rgba(0,0,0,.125);
        padding: .75rem 1.25rem;
        color: aliceblue;
    }
    .list-group-item {
        border: 1px solid rgba(0,0,0,.125);
    }
    .btn-lg {
        padding: .5rem 1rem;
        font-size: 1.25rem;
        line-height: 1.5;
        border-radius: .3rem;
    }

    .contenedor-botones {
        display: flex;
        justify-content: space-between;
        margin-top: 1rem;
        gap: 5%
    }


.botones {
        background-color: #102f4b;
        box-shadow: 0 5px 0 #0c2337;
        border-radius: 8px;
        padding: 10px;
        border: none;
        font-weight: bold;
        text-align: center;
        color: whitesmoke;
        min-width: fit-content;
        width: 20%;
    }

.papelera {
        box-shadow: 0 5px 0 black;
        border-radius: 8px;
        padding: 10px;
        border: none;
        font-weight: bold;
        text-align: center;
        color: whitesmoke;
        /* min-width: fit-content; */
        width: 2.5em;
    }

    .botones:hover {
        color: whitesmoke;
    }

    .papelera:active {
        box-shadow: none;
        transition: 0.1s ease;
        transform: translateY(5px);
    }
    .botones:active {
        box-shadow: none;
        transition: 0.1s ease;
        transform: translateY(5px);
    }
    .accion{
        border: 1px solid #ddd;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .accion:hover{
        transform: scale(1.01);
    }
</style>
@stop

@section('js')
<script>
    $(function () {
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
@stop

