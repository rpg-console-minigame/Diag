@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="m-0 text-dark">Usuarios</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
                <div class="card-tools">
                    <button type="button" class="botones bg-success" data-toggle="modal" data-target="#crearUsuarioModal">
                        <i class="fas fa-user-plus"></i> Crear Usuario
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Sede</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sede->nombre }}</td>
                                <td>
                                    <button class="botones bg-info p-2" data-toggle="modal" data-target="#editarModal{{ $user->id }}">
                                        <i class="fas fa-edit"></i>Editar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($users as $user)
    <div class="modal fade" id="editarModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel{{ $user->id }}">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Formulario para editar --}}
                    <form id="editarForm{{ $user->id }}" action="{{ route('usuarioUpdate', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="contrasena1">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="contrasena1" placeholder="Confirmar Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="sede_id">Sede</label>
                            <select class="form-control" name="sede_id">
                                @foreach ($sedes as $sede)
                                    <option value="{{ $sede->id }}" {{ $sede->id == $user->sede_id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contenedor-botones">
                            <button type="submit" class="botones bg-success">Guardar Cambios</button>
                        </div>
                    </form>

                    <form action="{{ route('usuarioDelete', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                        @csrf
                        @method('POST')
                        <button type="submit" class="botones bg-danger">Eliminar Usuario</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach


@section('css')
<style>
.botones {
        background-color: #102f4b;
        box-shadow: 0 5px 0 #0c2337;
        border-radius: 8px;
        padding: 10px;
        border: none;
        font-weight: bold;
        text-align: center;
        color: whitesmoke;
        min-width: fit-content;
        width: 20%;
    }

    .botones:hover {
        color: whitesmoke;
    }

    .botones:active {
        box-shadow: none;
        transition: 0.1s ease;
        transform: translateY(5px);
    }
</style>
@stop

<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearUsuarioModalLabel">Registrar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="crearUsuarioForm" action="{{ route('registroenter') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" required>
                    </div>
                    <div class="form-group">
                        <label for="repetirContrasena">Repetir Contraseña</label>
                        <input type="password" class="form-control" name="repetirContrasena" required>
                    </div>
                    <div class="form-group">
                        <label for="sede_id">Sede</label>
                        <select class="form-control" name="sede_id">
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="botones bg-success">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            alert("{{ session('error') }}");
        });
    </script>
@endif
@stop
