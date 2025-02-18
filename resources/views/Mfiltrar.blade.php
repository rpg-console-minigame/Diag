@extends('adminlte::page')

@section('title', 'Muestras')

@section('content_header')
    <h1 class="m-0 text-dark">Muestras</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session("user")->is_admin)
                <div class="mb-3">
                    <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#filterModal">
                        <i class="fas fa-filter mr-1"></i> Filtrar
                    </button> -->
                    <button class="botones" type="button" data-toggle="modal" data-target="#formModal">
                        <i class="fas fa-plus mr-1"></i> Crear Muestra
                    </button>
                </div>
                @endif

                <div class="row">
                    @foreach ($muestras as $muestra)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="/uploads/{{$muestra->img->link}}" class="card-img-top" alt="Imagen de muestra" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{$muestra->sigla}}</h5>
                                <p class="card-text"><strong>Formato:</strong> {{ $muestra->formato->nombre }}</p>
                                <p class="card-text"><strong>Sede:</strong> {{ $muestra->sede->nombre }}</p>
                                <p class="card-text"><strong>Tipo:</strong> {{ $muestra->tipo_naturaleza->nombre }}</p>
                                <p class="card-text"><strong>Calidad:</strong> {{ $muestra->calidad->nombre }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <a href="{{ route('muestra', ['id' => $muestra->id]) }}" class="btn medacOscuro btn-block">Ver más</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Filtro -->
<!-- <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filtrar Muestras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="sede">Sede</label>
                        <select class="form-control" id="sede">
                            <option>Todas</option>
                            <option>Córdoba</option>
                            <option>Málaga</option>
                            <option>Madrid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipoNaturaleza">Tipo de Naturaleza</label>
                        <select class="form-control" id="tipoNaturaleza">
                            <option>Todos</option>
                            <option>Presencial</option>
                            <option>En línea</option>
                            <option>Híbrido</option>
                        </select>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Aplicar Filtros</button>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Crear Muestra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_estudio">Tipo de Estudio:</label>
                                <select class="form-control" name="tipo_estudio_id" id="tipo_estudio" required>
                                    @foreach ($tEstudios as $tipoEstudio)
                                        <option value="{{ $tipoEstudio->id }}">{{ $tipoEstudio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formato_muestra">Formato de Muestra:</label>
                                <select class="form-control" name="muestra_id" id="formato_muestra" required>
                                    <option value="" disabled selected>Selecciona un formato de muestra</option>
                                    @foreach ($fMuestras as $fMuestra)
                                        <option value="{{ $fMuestra->id }}">{{ $fMuestra->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sede">Sede:</label>
                                <select class="form-control" name="sede_id" id="sede" required>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_naturaleza">Tipo de Naturaleza:</label>
                                <select class="form-control" name="tipo_naturaleza_id" id="tipo_naturaleza" required>
                                    @foreach ($tNaturalezas as $tNaturaleza)
                                        <option value="{{ $tNaturaleza->id }}">{{ $tNaturaleza->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="calidad">Calidad:</label>
                                <select class="form-control" name="calidad_id" id="calidad" required>
                                    @foreach ($calidades as $calidad)
                                        <option value="{{ $calidad->id }}" data-tipo-estudio="{{ $calidad->tipo_estudio_id }}">
                                            {{ $calidad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="textoCalidad">Texto Calidad:</label>
                                <input type="text" class="form-control" name="textoCalidad" id="textoCalidad" placeholder="Texto Calidad" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descripción" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="aumento">Aumento:</label>
                        <input type="number" class="form-control" name="aumento" id="aumento" placeholder="Aumento" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" required>
                            <label class="custom-file-label" for="image">Seleccionar archivo</label>
                        </div>
                    </div>
                    <button type="submit" class="btn medacOscuro btn-block mt-3">Crear Muestra</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-primary, .btn-success {
            transition: all 0.3s ease;
        }
        .btn-primary:hover, .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .medacOscuro{
            background-color: #343a40;
            color: white;
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

        .botones:hover {
            color: whitesmoke;
        }

        .botones:active {
            box-shadow: none;
            transition: 0.1s ease;
            transform: translateY(5px);
        }
    </style>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoEstudioSelect = document.getElementById('tipo_estudio');
        const calidadSelect = document.getElementById('calidad');
        const calidades = Array.from(calidadSelect.options);

        tipoEstudioSelect.addEventListener('change', function () {
            const selectedTipoEstudio = this.value;
            calidadSelect.innerHTML = '';

            calidades.forEach(function (calidad) {
                if (calidad.dataset.tipoEstudio === selectedTipoEstudio) {
                    calidadSelect.appendChild(calidad);
                }
            });
        });

        tipoEstudioSelect.dispatchEvent(new Event('change'));

        // Para mostrar el nombre del archivo seleccionado en el input de tipo file
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@stop

