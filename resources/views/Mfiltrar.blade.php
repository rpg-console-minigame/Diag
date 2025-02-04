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
               
                <h4 class="mb-4">{{ Auth::user()->name ?? 'Usuario' }}</h4>
          
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{route("welcome")}}" class="nav-link text-white">Muestras</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Perfil</a>
                    </li>
                    @if (session("user")->is_admin)
                        <li class="nav-item mb-2">
                            <a href="{{route("usuarios")}}" class="nav-link text-white">Usuarios</a>
                        </li>
                    @endif
                    <li class="nav-item mb-2">
                        <a href="{{route("logout")}}" class="nav-link text-white">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </aside>

   
        <main class="flex-grow-1 p-4">
            @if (session("user")->is_admin) 
            <div class="d-flex justify-content-end mb-4 ">
                
                <button class="btn text-bold dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5 class="lightMedac">Filtrar</h5>
                </button>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle lightMedac" href="#">Sede</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lightMedac" href="#">Córdoba</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Málaga</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Madrid</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle lightMedac" href="#">Tipo de Naturaleza</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lightMedac" href="#">Presencial</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">En línea</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Híbrido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle lightMedac" href="#">Formato de Muestra</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lightMedac" href="#">Presencial</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">En línea</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Híbrido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle lightMedac" href="#">Calidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lightMedac" href="#">Alta</a></li>
                            <li><a class="dropdown-item lightMedac " href="#">Media</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Baja</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle lightMedac" href="#">Tipo de Estudio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lightMedac" href="#">Alta</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Media</a></li>
                            <li><a class="dropdown-item lightMedac" href="#">Baja</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @endif



            <div class="flex-grow-1 d-flex justify-content-center align-items-center">
                <div class="contenedor">
                    @foreach ($muestras as $muestra)
                    <div class="muestra oscuroMedac">
                        <img src="/uploads/{{$muestra->img->link}}" alt="Imagen de una pirámide">
                        <div class="card-body whiteMedac">
                            <h3 class="card-title">{{$muestra->sigla}}</h3>
                            <p class="card-text">Formato: {{ $muestra->formato->nombre }}</p>
                            <p class="card-text">Sede: {{ $muestra->sede->nombre }}</p>
                            <p class="card-text">Tipo de Naturaleza: {{ $muestra->tipo_naturaleza->nombre }}</p>
                            <p class="card-text">Calidad: {{ $muestra->calidad->nombre }}</p>
                            <a href="{{ route('muestra', ['id' => $muestra->id]) }}">
                                <div class="btnMuestra whiteMedac">Ver más</div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a class="btn oscuroMedac text-white p-3" href="{{route("crearmuestra")}}">Crear Muestra</a>
            </div>

        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
