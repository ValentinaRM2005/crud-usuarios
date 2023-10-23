<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cb455d277b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-center p-4">USUARIOS</h1>

 
    
    <button style="margin-left: 5%" class="btn btn-warning agregar" data-bs-toggle="modal" data-bs-target="#ModalAgregarUsuario">Agregar usuario</button>
    <br><br>
    <div class="table-responsive" style=" display: flex; justify-content:center">
      <!-- Modal de agregar -->
      <div class="modal fade" id="ModalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("crud.create")}}" method="POST">
                                        <!-- Mecanismo de seguridad para evitar ataques al usuario -->
                                          @csrf
                                          <div class="mb-3">
                                            <label for="AgregarNombres" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="AgregarNombres" name="AgregarNombres">
                                        </div>
                                        <div class="mb-3">
                                            <label for="AgregarApellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="AgregarApellidos" name="AgregarApellidos">
                                        </div>
                                            <div class="mb-3">
                                              <label for="AgregarUsuario" class="form-label">Correo Electrónico</label>
                                              <input type="text" class="form-control" id="AgregarUsuario" name="AgregarUsuario">
                                          </div>
                                            <div class="mb-3">
                                                <label for="AgregarClave" class="form-label">Clave</label>
                                                <input type="password" class="form-control" id="AgregarClave" name="AgregarClave">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">Guardar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


        <table class="table table-bordered border-black table-hover" style="width: 90%; text-align:center">
            <thead class="table-dark ">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Clave</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider ">
                @foreach ($datos as $item)
                    <tr>
                        <th>{{ $item->id_usuario }}</th>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->clave }}</td>
                        <td class="text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEditarUsuario{{ $item->id_usuario }}"
                                class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEliminarUsuario" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>

                        <!-- Modal de editar -->
                        <div class="modal fade" id="ModalEditarUsuario{{ $item->id_usuario }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("crud.update")}}" method="POST">
                                          @csrf
                                            <div class="mb-3">
                                                <label for="EditarIdUsuario" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="EditarIdUsuario" name="EditarIdUsuario" readonly  value="{{$item->id_usuario}}" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="EditarNombres" class="form-label">Nombres</label>
                                                <input type="text" class="form-control" id="EditarNombres" name="EditarNombres" value="{{$item->nombres}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="EditarApellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="EditarApellidos" name="EditarApellidos" value="{{$item->apellidos}}">
                                            </div>
                                            <div class="mb-3">
                                              <label for="EditarUsuario" class="form-label">Correo Electrónico</label>
                                              <input type="text" class="form-control" id="EditarUsuario" name="EditarUsuario" value="{{$item->email}}">
                                          </div>
                                            <div class="mb-3">
                                                <label for="EditarClave" class="form-label">Clave</label>
                                                <input type="password" class="form-control" id="EditarClave" name="EditarClave" value="{{$item->clave}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal de eliminar -->
                        <div class="modal fade" id="ModalEliminarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("crud.delete",$item->id_usuario)}}" >
                                          @csrf
                                            <div class="mb-3">
                                                <label for="EditarClave" class="form-label">¿Estás seguro de que deseas eliminar este usuario?</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">Confirmar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (session("Correcto"))
      <div class="alert alert-success">{{session("Correcto")}}</div>
    @endif
    @if (session("Incorrecto"))
      <div class="alert alert-danger">{{session ("Incorrecto")}}</div>
    @endif

</body>

</html>
