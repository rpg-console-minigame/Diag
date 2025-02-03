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
            background-color: #f4f6f9;
            padding: 20px;
        }
        .card {
            margin-top: 20px;
            border-radius: 10px;
        }
        .card-header {
            background-color: #102f4b;
            color: white;
            font-weight: bold;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-oscuro {
            background-color: #102f4b;
        }
        .img-fluid {
            border-radius: 10px;
        }
        .table thead th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Detalles de la Muestra</h1>

        <div class="card">
            <div class="card-header">
                Información General
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Formato de Muestra</th>
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
                        <tr class="text-center">
                            <td>1</td>
                            <td>Antonio Reyes</td>
                            <td>antonio@gmail.com</td>
                            <td>Cordoba</td>
                            <td>1</td>
                            <td>Antonio Reyes</td>
                            <td>antonio@gmail.com</td>
                            <td>antonio@gmail.com</td>
                            <td>antonio@gmail.com</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                Imagen de la Muestra
            </div>
        </div>
        
        
        <div class="card mt-4">
            <div class="card-header">
                Interpretaciones
            </div>
            <div class="card-body">
                <ul class="list-group">
                    
                    <li class="list-group-item">
                        <p><strong>Descripción:</strong></p>
                        <p><strong>Tipo:</strong></p>
                        <p><strong>Creado:</strong></p>
                    </li>
                </ul>
            </div>
        </div>
        
        <a class="btn btn-oscuro text-white mt-4 btn-block">Interpretar Muestra</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
