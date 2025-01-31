<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista con Logo y Menú</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column vh-100 bg-light">
    
    <header class="bg-white shadow p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="https://via.placeholder.com/150" alt="Logo" style="width: 100px;">
            <h2 class="m-0">Muestras</h2>
        </div>
    </header>

    <div class="d-flex flex-grow-1">
        
        <aside class="bg-dark text-white p-4" style="width: 250px;">
            <div class="mb-5">
               
                <h4 class="mb-4">{{ Auth::user()->name ?? 'Usuario' }}</h4>
                
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

     
        <main class="flex-grow-1 d-flex justify-content-center align-items-center">
            <div>
                <h1>Bienvenido</h1>
                <p>Selecciona una opción del menú para continuar.</p>
            </div>
        </main>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
