<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista con Logo y Menú</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dropdown-menu .dropdown-menu {
            position: absolute;
            top: 30%;
            right: 100%;
            margin-top: -5px;
        }


        .dropdown-menu li:hover>.dropdown-menu {
            display: block;
        }

        .header {
            position: sticky;
            top: 0;
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

        .oscuroMedac {
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
                        <a href="{{ route('welcome') }}" class="nav-link text-white">Muestras</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Usuarios</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="" class="nav-link text-white">Perfil</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('logout') }}" class="nav-link text-white">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </aside>


        <main class="flex-grow-1 p-4">

            <div class="container">
                <h1 class="mb-4">Listado de Usuarios</h1>

                <table class="table table-bordered table-striped">
                    <thead class="oscuroMedac text-white">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Sede</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sede->nombre }}</td>
                                <td>
                                    <button class="btn oscuroMedac text-white btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editarModal{{ $user->id }}"
                                        onclick="setEditData(1, 'Circular', 'Orgánico', 'Sede 1', 'Naturaleza 1', 'Alta', 'Estudio 1')">Editar</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                <a class="btn oscuroMedac text-white p-3" data-bs-toggle="modal"
                    data-bs-target="#crearUsuarioModal">Crear Usuario</a>
            </div>

        </main>
        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editarForm">
                            <div class="mb-3">
                                <label for="muestraID" class="form-label">ID del Usuario</label>
                                <input type="text" class="form-control" id="muestraID" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="descripcion" placeholder="Descripción">
                            </div>
                            <div class="mb-3">
                                <label for="formato" class="form-label">Email</label>
                                <input type="text" class="form-control" id="formato"
                                    placeholder="Formato de Muestra">
                            </div>
                            <div class="mb-3">
                                <label for="sede" class="form-label">Sede</label>
                                <input type="text" class="form-control" id="sede" placeholder="Sede">
                            </div>
                            <button type="submit" class="btn btn-dark">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($users as $user)
            {{-- modales para editar --}}
            <div class="modal fade" id="editarModal{{ $user->id }}" tabindex="-1"
                aria-labelledby="editarModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel{{ $user->id }}">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editarForm{{ $user->id }}">
                                <div class="mb-3">
                                    <label for="muestraID" class="form-label">ID del Usuario</label>
                                    <input type="text" class="form-control" id="muestraID{{ $user->id }}" value="{{ $user->id }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="descripcion{{ $user->id }}" value="{{ $user->name }}" placeholder="Descripción">
                                </div>
                                <div class="mb-3">
                                    <label for="formato" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="formato{{ $user->id }}" value="{{ $user->email }}" placeholder="Formato de Muestra">
                                </div>
                                <div class="mb-3">
                                    <label for="sede" class="form-label">Sede</label>
                                    <select class="form-select" id="sede{{ $user->id }}">
                                        @foreach ($sedes as $sede)
                                            <option value="{{ $sede->id }}" {{ $sede->id == $user->sede_id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearUsuarioModalLabel">Registrar Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="crearUsuarioForm">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="repetirContrasena" class="form-label">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="repetirContrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="sede" class="form-label">Sede</label>
                                <input type="text" class="form-control" id="sede" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
