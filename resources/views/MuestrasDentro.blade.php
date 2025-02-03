<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Muestra</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        h1 {
            color: #102f4b;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        
        <h1 class="text-center mb-4">Detalles de la Muestra</h1>

        
        <div class="card mb-4">
            <div class="card-header text-center">Información General</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
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
                                <td>1</td>
                                <td>Antonio Reyes</td>
                                <td>Córdoba</td>
                                <td>Natural</td>
                                <td>Alta</td>
                                <td>Detalles adicionales</td>
                                <td>antonio@gmail.com</td>
                                <td>2024-02-01</td>
                                <td>2024-02-02</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
        <div class="card mb-4">
            <div class="card-header text-center">Imagen de la Muestra</div>
            <div class="card-body text-center">
                <img src="img/piramide.png" class="img-fluid" alt="Imagen de la muestra"> 
                <img src="img/1.png" class="img-fluid" alt="Imagen de la muestra"> 
                <img src="img/2.png" class="img-fluid" alt="Imagen de la muestra"> 
                <img src="img/3.png" class="img-fluid" alt="Imagen de la muestra">  
                <img src="img/piramide.png" class="img-fluid" alt="Imagen de la muestra"> 
            </div>
        </div>

       
        <div class="card mb-4">
            <div class="card-header text-center">Interpretaciones</div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <p class="mb-1"><strong>Descripción:</strong> Análisis detallado de la muestra.</p>
                        <p class="mb-1"><strong>Tipo:</strong> Biológico</p>
                        <p class="mb-0"><strong>Creado:</strong> 2024-02-01</p>
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="d-grid">
            <a href="#" class="btn btn-custom">Interpretar Muestra</a>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>