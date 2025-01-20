<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Interpretación</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Opcional: Bootstrap 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="text-center mb-4">Formulario de Interpretación</h2>
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
                                @foreach ($interpretaciones as $interpretacion)
                                    <option value="{{ $interpretacion->id }}">{{ $interpretacion->clave }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botón Enviar -->
                        <div class="text-center
