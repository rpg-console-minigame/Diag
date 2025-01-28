<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista con Logo y Menú</title>
    <!-- Carga Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilo para posicionar los submenús */
        .dropdown-menu .dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%; /* Posiciona el submenú a la derecha */
            margin-top: -5px; /* Ajusta el borde superior */
        }

        /* Muestra el submenú al hacer hover */
        .dropdown-menu li:hover > .dropdown-menu {
            display: block;
        }

        /* Opcional: añade un indicador visual para los submenús */
        .dropdown-item.dropdown-toggle::after {
            content: "›"; /* Flecha indicativa */
            float: right;
        }
    </style>
</head>
<body class="d-flex flex-column vh-100 bg-light">
    <header class="bg-white shadow p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="https://via.placeholder.com/150" alt="Logo" style="width: 100px;">
            <h2 class="m-0">Muestras</h2>
        </div>
    </header>

    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <aside class="bg-dark text-white p-4" style="width: 250px;">
            <div class="mb-5">
                <!-- Nombre del usuario -->
                <h4 class="mb-4">{{ Auth::user()->name ?? 'Usuario' }}</h4>
                <!-- Menú -->
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Muestras</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white text-start">Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 d-flex flex-column align-items-start p-4">
            <!-- Botón Filtrar -->
            <div class="mb-4">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Filtrar
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Sede</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Córdoba</a></li>
                            <li><a class="dropdown-item" href="#">Málaga</a></li>
                            <li><a class="dropdown-item" href="#">Madrid</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Tipo de Naturaleza</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Presencial</a></li>
                            <li><a class="dropdown-item" href="#">En línea</a></li>
                            <li><a class="dropdown-item" href="#">Híbrido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Formato de Muestra</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Presencial</a></li>
                            <li><a class="dropdown-item" href="#">En línea</a></li>
                            <li><a class="dropdown-item" href="#">Híbrido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Calidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta</a></li>
                            <li><a class="dropdown-item" href="#">Media</a></li>
                            <li><a class="dropdown-item" href="#">Baja</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Tipo de Estudio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta</a></li>
                            <li><a class="dropdown-item" href="#">Media</a></li>
                            <li><a class="dropdown-item" href="#">Baja</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            
            <div class="flex-grow-1 d-flex justify-content-center align-items-center">
                <div>
                    <h1>Bienvenido</h1>
                    <p>Selecciona una opción del menú para continuar.</p>
                </div>
            </div>
        </main>
    </div>

    <!-- Carga Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
