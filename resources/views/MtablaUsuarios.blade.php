<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Muestras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column vh-100 bg-light">

    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center">
        <div class="container">
        <h1 class="mb-4">Listado de Usuarios</h1>

            <div>
                <button class="btn btn-dark d-flex justify-content-end p-3" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">Crear Usuario</button>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Sede</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="text-center">
                        
                        <td>1</td>
                        <td>Antonio Reyes</td>
                        <td>antonio@gmail.com</td>
                        <td>Cordoba</td>
                        <td>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="setEditData(1, 'Circular', 'Orgánico', 'Sede 1', 'Naturaleza 1', 'Alta', 'Estudio 1')">Editar</button>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td>Alejandro Quintero</td>
                        <td>aqp@gmail.com</td>
                        <td>Malaga</td>
                        <td>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="setEditData(2, 'Triangular', 'Inorgánico', 'Sede 2', 'Naturaleza 2', 'Media', 'Estudio 2')">Editar</button>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3</td>
                        <td>Alex Jefe</td>
                        <td>eljefe@gmail.com</td>
                        <td>Cordoba</td>
                        <td>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="setEditData(3, 'Rectangular', 'Orgánico', 'Sede 3', 'Naturaleza 3', 'Baja', 'Estudio 3')">Editar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
                            <input type="text" class="form-control" id="formato" placeholder="Formato de Muestra">
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
    

    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearUsuarioModalLabel">Registrar Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <script>
        document.getElementById('crearUsuarioForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const nombre = document.getElementById('nombre').value;
            const correo = document.getElementById('correo').value;
            const contrasena = document.getElementById('contrasena').value;
            const repetirContrasena = document.getElementById('repetirContrasena').value;
            const sede = document.getElementById('sede').value;

            if (contrasena !== repetirContrasena) {
                alert('Las contraseñas no coinciden.');
                return;
            }

            alert(`Usuario registrado: \nNombre: ${nombre}\nCorreo: ${correo}\nSede: ${sede}`);
            
            const modal = bootstrap.Modal.getInstance(document.getElementById('crearUsuarioModal'));
            modal.hide();
        });
    </script>
    <script>
        function setEditData(id, descripcion, formato, sede, naturaleza, calidad, estudio) {
            document.getElementById('muestraID').value = id;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('formato').value = formato;
            document.getElementById('sede').value = sede;
            document.getElementById('naturaleza').value = naturaleza;
            document.getElementById('calidad').value = calidad;
            document.getElementById('estudio').value = estudio;
        }

        document.getElementById('editarForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const id = document.getElementById('muestraID').value;
            const descripcion = document.getElementById('descripcion').value;
            const formato = document.getElementById('formato').value;
            const sede = document.getElementById('sede').value;
            const naturaleza = document.getElementById('naturaleza').value;
            const calidad = document.getElementById('calidad').value;
            const estudio = document.getElementById('estudio').value;

            if (descripcion && formato && sede && naturaleza && calidad && estudio) {
                alert(`Muestra con ID ${id} actualizada.\nDescripción: ${descripcion}\nFormato: ${formato}\nSede: ${sede}\nNaturaleza: ${naturaleza}\nCalidad: ${calidad}\nEstudio: ${estudio}`);
                const modal = bootstrap.Modal.getInstance(document.getElementById('editarModal'));
                modal.hide();
            } else {
                alert('Por favor, completa todos los campos.');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
