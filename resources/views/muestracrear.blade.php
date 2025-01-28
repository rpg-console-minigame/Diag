<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Muestra</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 (opcional) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Formulario de Muestra</h1>
        <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Tipo de Estudio -->
            <div class="form-group">
                <label for="tipo_estudio">Tipo de Estudio:</label>
                <select class="form-control" name="tipo_estudio_id" id="tipo_estudio" required>
                    @foreach ($tEstudios as $tipoEstudio)
                        <option value="{{ $tipoEstudio->id }}">{{ $tipoEstudio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Calidad -->
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

            <!-- Descripción -->
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Descripción" required>
            </div>

            <!-- Muestra -->
            <div class="form-group">
                <label for="muestra">Selecciona una muestra:</label>
                <select class="form-control" name="muestra_id" id="muestra" required>
                    @foreach ($fMuestras as $fMuestra)
                        <option value="{{ $fMuestra->id }}">{{ $fMuestra->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Naturaleza -->
            <div class="form-group">
                <label for="naturaleza">Tipo de Naturaleza:</label>
                <select class="form-control" name="tipo_naturaleza_id" id="naturaleza" required>
                    @foreach ($tNaturalezas as $tNaturaleza)
                        <option value="{{ $tNaturaleza->id }}">{{ $tNaturaleza->nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- textoCalidad --}}

            <div class="form-group">
                <label for="textoCalidad">Texto Calidad:</label>
                <input type="text" class="form-control" name="textoCalidad" id="textoCalidad" placeholder="Texto Calidad" required>
            </div>

            <!-- Aumento -->
            <div class="form-group">
                <label for="aumento">Aumento:</label>
                <input type="number" class="form-control" name="aumento" placeholder="Aumento" required>
            </div>


            <!-- Imagen -->
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Botón -->
            <button type="submit" class="btn btn-primary btn-block mt-3">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 (opcional) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->

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
        });
    </script>
</body>

</html>
