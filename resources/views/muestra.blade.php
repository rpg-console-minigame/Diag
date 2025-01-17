<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Muestra</title>
</head>

<body>
    <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="tipo_estudio">Tipo de Estudio:</label>
        <select name="tipo_estudio_id" id="tipo_estudio">
            @foreach ($tEstudios as $tipoEstudio)
                <option value="{{ $tipoEstudio->id }}">{{ $tipoEstudio->nombre }}</option>
            @endforeach
        </select>

        <label for="calidad">Calidad:</label>
        <select name="calidad_id" id="calidad">
            @foreach ($calidades as $calidad)
                <option value="{{ $calidad->id }}" data-tipo-estudio="{{ $calidad->tipo_estudio_id }}">
                    {{ $calidad->nombre }}</option>
            @endforeach
        </select>

        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" placeholder="Descripción">

        <label for="muestra">Selecciona una muestra:</label>
        <select name="muestra_id" id="muestra">
            @foreach ($fMuestras as $fMuestra)
                <option value="{{ $fMuestra->id }}">{{ $fMuestra->nombre }}</option>
            @endforeach
        </select>
        <select name="sede_id" id="sede">
            @foreach ($sedes as $sede)
                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
            @endforeach
        </select>
        <select name="tipo_naturaleza_id" id="naturaleza">
            @foreach ($tNaturalezas as $tNaturaleza)
                <option value="{{ $tNaturaleza->id }}">{{ $tNaturaleza->nombre }}</option>
            @endforeach
        </select>
        <input type="number" name="aumento" placeholder="Aumento">
        <label for="image">Imagen</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
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
    });
</script>