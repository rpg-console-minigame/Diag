<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Muestras</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column vh-100 bg-light">
    <
    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <h1 class="mb-4">Listado de Muestras</h1>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Formato de Muestra</th>
                        <th>Sede</th>
                        <th>Tipo Naturaleza</th>
                        <th>Calidad</th>
                        <th>Tipo de Estudio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="text-center">
                        
                        <td>1</td>
                        <td>Circular</td>
                        <td>Orgánico</td>
                        <td>Sede 1</td>
                        <td>Naturaleza 1</td>
                        <td>Alta</td>
                        <td>Estudio 1</td>
                        <td>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="setEditData(1, 'Circular', 'Orgánico', 'Sede 1', 'Naturaleza 1', 'Alta', 'Estudio 1')">Editar</button>
                        </td>
                    </tr>
                    <tr class="text-center">
                        
                        <td>2</td>
                        <td>Triangular</td>
                        <td>Inorgánico</td>
                        <td>Sede 2</td>
                        <td>Naturaleza 2</td>
                        <td>Media</td>
                        <td>Estudio 2</td>
                        <td>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="setEditData(2, 'Triangular', 'Inorgánico', 'Sede 2', 'Naturaleza 2', 'Media', 'Estudio 2')">Editar</button>
                        </td>
                    </tr>
                    <tr class="text-center">
                        
                        <td>3</td>
                        <td>Rectangular</td>
                        <td>Orgánico</td>
                        <td>Sede 3</td>
                        <td>Naturaleza 3</td>
                        <td>Baja</td>
                        <td>Estudio 3</td>
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
                    <h5 class="modal-title" id="editarModalLabel">Editar Muestra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarForm">
                        <div class="mb-3">
                            <label for="muestraID" class="form-label">ID de la Muestra</label>
                            <input type="text" class="form-control" id="muestraID" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" placeholder="Descripción">
                        </div>
                        <div class="mb-3">
                            <label for="formato" class="form-label">Formato de Muestra</label>
                            <input type="text" class="form-control" id="formato" placeholder="Formato de Muestra">
                        </div>
                        <div class="mb-3">
                            <label for="sede" class="form-label">Sede</label>
                            <input type="text" class="form-control" id="sede" placeholder="Sede">
                        </div>
                        <div class="mb-3">
                            <label for="naturaleza" class="form-label">Tipo Naturaleza</label>
                            <input type="text" class="form-control" id="naturaleza" placeholder="Tipo Naturaleza">
                        </div>
                        <div class="mb-3">
                            <label for="calidad" class="form-label">Calidad</label>
                            <input type="text" class="form-control" id="calidad" placeholder="Calidad">
                        </div>
                        <div class="mb-3">
                            <label for="estudio" class="form-label">Tipo de Estudio</label>
                            <input type="text" class="form-control" id="estudio" placeholder="Tipo de Estudio">
                        </div>
                        <button type="submit" class="btn btn-dark">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
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
