@extends('adminlte::page')

@section('title', 'Muestras')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-microscope mr-2"></i>Muestras</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('user')->is_admin)
                        <div class="mb-3">
                            <button class="botones" type="button" data-toggle="modal" data-target="#formModal">
                                <i class="fas fa-plus-circle mr-1"></i> Crear Muestra
                            </button>
                        </div><br>
                    @endif

                    <div class="row">
                        @foreach ($muestras as $muestra)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card h-100 shadow-sm muestra-card">
                                    <div class="card-img-overlay">
                                        <span class="badge badge-pill badge-primary"><i
                                                class="fas fa-star mr-1"></i>{{ $muestra->calidad->nombre }}</span>
                                    </div>
                                    <img src="/uploads/{{ $muestra->img->link }}" class="card-img-top"
                                        alt="Imagen de muestra">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-flask mr-2"></i>{{ $muestra->sigla }}</h5>
                                        <p class="card-text"><i class="fas fa-file-alt mr-2"></i><strong>Formato:</strong>
                                            {{ $muestra->formato->nombre }}</p>
                                        <p class="card-text"><i
                                                class="fas fa-map-marker-alt mr-2"></i><strong>Sede:</strong>
                                            {{ $muestra->sede->nombre }}</p>
                                        <p class="card-text"><i class="fas fa-atom mr-2"></i><strong>Tipo:</strong>
                                            {{ $muestra->tipo_naturaleza->nombre }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        <a href="{{ route('muestra', ['id' => $muestra->id]) }}"
                                            class="btn medacOscuro btn-block">
                                            <i class="fas fa-eye mr-2"></i>Ver más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel"><i class="fas fa-plus-circle mr-2"></i>Crear Muestra</h5>
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
                                    <label for="tipo_estudio"><i class="fas fa-book mr-2"></i>Tipo de Estudio:</label>
                                    <select class="form-control" name="tipo_estudio_id" id="tipo_estudio" required>
                                        @foreach ($tEstudios as $tipoEstudio)
                                            <option value="{{ $tipoEstudio->id }}">{{ $tipoEstudio->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formato_muestra"><i class="fas fa-file-alt mr-2"></i>Formato de
                                        Muestra:</label>
                                    <select class="form-control" name="muestra_id" id="formato_muestra" required>
                                        <option value="" disabled selected>Selecciona un formato de muestra</option>
                                        @foreach ($fMuestras as $fMuestra)
                                            <option value="{{ $fMuestra->id }}">{{ $fMuestra->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sede"><i class="fas fa-map-marker-alt mr-2"></i>Sede:</label>
                                    <select class="form-control" name="sede_id" id="sede" required>
                                        @foreach ($sedes as $sede)
                                            <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_naturaleza"><i class="fas fa-atom mr-2"></i>Tipo de Naturaleza:</label>
                                    <select class="form-control" name="tipo_naturaleza_id" id="tipo_naturaleza" required>
                                        @foreach ($tNaturalezas as $tNaturaleza)
                                            <option value="{{ $tNaturaleza->id }}">{{ $tNaturaleza->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="calidad"><i class="fas fa-star mr-2"></i>Calidad:</label>
                                    <select class="form-control" name="calidad_id" id="calidad" required>
                                        @foreach ($calidades as $calidad)
                                            <option value="{{ $calidad->id }}"
                                                data-tipo-estudio="{{ $calidad->tipo_estudio_id }}">
                                                {{ $calidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="textoCalidad"><i class="fas fa-info-circle mr-2"></i>Texto Calidad:</label>
                                    <input type="text" class="form-control" name="textoCalidad" id="textoCalidad"
                                        placeholder="Texto Calidad" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"><i class="fas fa-align-left mr-2"></i>Descripción:</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descripción"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="aumento"><i class="fas fa-search-plus mr-2"></i>Aumento:</label>
                            <input type="number" class="form-control" name="aumento" id="aumento"
                                placeholder="Aumento" required>
                        </div>
                        <div class="form-group">
                            <label for="image"><i class="fas fa-image mr-2"></i>Imagen:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image"
                                    accept="image/*" required>
                                <label class="custom-file-label" for="image">Seleccionar archivo</label>
                            </div>
                        </div>
                        <button id="btn-crearmuestra" type="submit" class="btn medacOscuro btn-block mt-3">
                            <i class="fas fa-save mr-2"></i>Crear Muestra
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="mb-0">&copy; 2025 <strong>Medac</strong>. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
@stop

@section('css')
    <style>
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .muestra-card {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 5px 5px 15px #d1d1d1, -5px -5px 15px #ffffff;
        }

        .muestra-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #102f4b;
        }

        .card-img-overlay {
            top: auto;
            bottom: 60%;
        }

        .badge-primary {
            background-color: #102f4b;
            font-size: 0.8em;
            padding: 0.5em 0.7em;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: #102f4b;
            font-weight: bold;
            margin-bottom: 1rem;
            font-size: 1.2em;
        }

        .card-text {
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.9em;
        }

        .btn-primary,
        .btn-success,
        .medacOscuro {
            transition: all 0.3s ease;
            border: none;
        }

        .medacOscuro {
            background-color: #102f4b;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .medacOscuro:hover {
            background-color: #1c4966;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .botones {
            background-color: #102f4b;
            box-shadow: 0 5px 0 #0c2337;
            border-radius: 8px;
            padding: 12px 25px;
            border: none;
            font-weight: bold;
            text-align: center;
            color: white;
            min-width: fit-content;
            width: auto;
            display: inline-block;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .botones:hover {
            background-color: #1c4966;
            color: white;
            transform: translateY(-2px);
        }

        .botones:active {
            box-shadow: none;
            transform: translateY(3px);
        }

        .modal-content {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #102f4b;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #102f4b;
            box-shadow: 0 0 0 0.2rem rgba(16, 47, 75, 0.25);
        }

        .custom-file-label::after {
            background-color: #102f4b;
            color: white;
        }
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoEstudioSelect = document.getElementById('tipo_estudio');
            const calidadSelect = document.getElementById('calidad');
            const calidades = Array.from(calidadSelect.options);

            tipoEstudioSelect.addEventListener('change', function() {
                const selectedTipoEstudio = this.value;
                calidadSelect.innerHTML = '';

                calidades.forEach(function(calidad) {
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

    {{-- CARGA SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('#btn-crearmuestra').addEventListener('click', () => {
            Swal.fire({
                title: "Tu muestra ha sido creada",
                icon: "success",
                draggable: true
            });
        })
    </script>
@stop
