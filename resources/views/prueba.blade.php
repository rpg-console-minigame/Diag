<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis</title>
    <!-- Carga Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Paleta de colores MEDAC */
        :root {
            --medac-blue: #102f4b;
            --medac-light-blue: #0073CE;
            --medac-white: #FFFFFF;
        }

        body {
            background-color: var(--medac-white);
        }

        .header{
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: var(--medac-blue);
            color: var(--medac-white);
        }

        .sidebar {
            background-color: var(--medac-blue);
            color: var(--medac-white);
            width: 250px;
        }

        .nav-link {
            color: var(--medac-white);
        }

        .nav-link:hover {
            background-color: var(--medac-light-blue);
        }

        .btn-dark {
            background-color: var(--medac-light-blue);
            border: none;
        }

        .btn-dark:hover {
            background-color: var(--medac-blue);
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            max-width: 1000px;
            padding: 20px;
            margin: auto;
            border: 1px solid #ddd;
        }

        .muestra {
            border: 1px solid #ddd;
            border-radius: 10px;
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
            font-weight: bold;
            background-color: var(--medac-light-blue);
            color: var(--medac-white);
            cursor: pointer;
            border: 1px solid #ddd;
        }

        .btnMuestra:hover {
            background-color: var(--medac-blue);
        }

       
        .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        min-width: 200px;
        left: 0;
        top: 100%; /* Esto asegura que aparezca debajo del botón */
        border: 1px solid #ddd;
    }

    .position-relative:hover .dropdown-menu {
        display: block;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu-list {
        display: none;
        position: relative;
        top: 100%;
        left: 0;
        background: white;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        min-width: 180px;
        border: 1px solid #ddd;
    }

    .dropdown-submenu:hover > .dropdown-submenu-list {
        display: block;
    }

    .checkbox {
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 1px solid #ccc;
        margin-left: 8px;
        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover .checkbox {
        background-color: #e0e0e0;
    }

    .dropdown-item.selected .checkbox {
        background-color: #007bff;
    }

</style>

    </style>
</head>
<body class="d-flex flex-column vh-100">
    <header class="shadow p-3 header">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="/img/piramide.png" alt="Logo" style="width: 100px;">
            <h3 class="m-0">Muestras</h3>
        </div>
    </header>

    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <aside class="sidebar p-4">
            <h4 class="mb-4">{{ Auth::user()->name ?? 'Usuario' }}</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link">Muestras</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link">Perfil</a></li>
                <li class="nav-item">
                    <form method="POST" action="">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-start">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
           <!-- Botón Filtrar -->
<div class="d-flex justify-content-end mb-4 position-relative">
    <button class="btn text-bold" id="dropdownMenuButton">
        <h5 class="lightMedac">Filtrar</h5>
    </button>
    <ul class="dropdown-menu">
        <li class="dropdown-submenu">
            <a class="dropdown-item lightMedac" href="#">Sede
                <span class="checkbox"></span>
            </a>
            <ul class="dropdown-submenu-list">
                <div><a class="dropdown-item lightMedac" href="#">Córdoba
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Málaga
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Madrid
                    <span class="checkbox"></span>
                </a></d>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a class="dropdown-item lightMedac" href="#">Tipo de Naturaleza
                <span class="checkbox"></span>
            </a>
            <ul class="dropdown-submenu-list">
                <div><a class="dropdown-item lightMedac" href="#">Presencial
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">En línea
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Híbrido
                    <span class="checkbox"></span>
                </a></div>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a class="dropdown-item lightMedac" href="#">Formato de Muestra
                <span class="checkbox"></span>
            </a>
            <ul class="dropdown-submenu-list">
                <div><a class="dropdown-item lightMedac" href="#">Presencial
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">En línea
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Híbrido
                    <span class="checkbox"></span>
                </a></div>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a class="dropdown-item lightMedac" href="#">Calidad
                <span class="checkbox"></span>
            </a>
            <ul class="dropdown-submenu-list">
                <div><a class="dropdown-item lightMedac" href="#">Alta
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Media
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Baja
                    <span class="checkbox"></span>
                </a></div>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a class="dropdown-item lightMedac" href="#">Tipo de estudio
                <span class="checkbox"></span>
            </a>
            <ul class="dropdown-submenu-list">
                <div><a class="dropdown-item lightMedac" href="#">Presencial
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">En línea
                    <span class="checkbox"></span>
                </a></div>
                <div><a class="dropdown-item lightMedac" href="#">Híbrido
                    <span class="checkbox"></span>
                </a></div>
            </ul>
        </li>
    </ul>
</div>
            
            <div class="contenedor">
                <div class="muestra">
                    <img src="/img/piramide.png" alt="Imagen de una pirámide">
                    <div class="btnMuestra">Ver más</div>
                </div>
                <div class="muestra">
                    <img src="/img/piramide.png" alt="Imagen de una pirámide">
                    <div class="btnMuestra">Ver más</div>
                </div>
                <div class="muestra">
                    <img src="/img/piramide.png" alt="Imagen de una pirámide">
                    <div class="btnMuestra">Ver más</div>
                </div>
            </div>
        </main>
    </div>

    <script>
    // JavaScript para gestionar la selección del cuadrado
    const items = document.querySelectorAll('.dropdown-item');
    items.forEach(item => {
        item.addEventListener('click', function() {
            // Toggle la clase 'selected' cuando se hace clic
            item.classList.toggle('selected');
        });
    });
    </script>
    <!-- Carga Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>