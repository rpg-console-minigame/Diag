<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Despedido</title>
    <!-- Carga Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        .dropdown-menu .dropdown-menu {
            position: absolute;
            top: 30%;
            right: 100%; 
            margin-top: -5px;
        }

        
        .dropdown-menu li:hover > .dropdown-menu {
            display: block;
        }

        .header{
            position:sticky;
            top:0;
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

        .oscuroMedac{
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


<body class="d-flex flex-column vh-100 bg-light">
    <header class="bg-white shadow p-3 header">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="/img/piramide.png" alt="Logo" style="width: 100px;">
            <h3 class="m-0">Muestras</h2>
        </div>
    </header>

    <div class="d-flex flex-grow-1">
     
        <aside class="oscuroMedac text-white p-4" style="width: 250px;">
            <div class="mb-5">
               
                <h4 class="mb-4">Usuario</h4>
          
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a  class="nav-link text-white">Muestras</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Perfil</a>
                    </li>
                    
                        <li class="nav-item mb-2">
                            <a  class="nav-link text-white">Usuarios</a>
                        </li>
                    
                    <li class="nav-item mb-2">
                        <a  class="nav-link text-white">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </aside>

   
        <main class="flex-grow-1 p-4">
          
            <div class="container py-5">
                
            <h1 class="text-center mb-4">Detalles de la Muestra</h1>

                
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
                    <a class="btn btn-custom">Interpretar Muestra</a>
                </div>
            </div>

        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
