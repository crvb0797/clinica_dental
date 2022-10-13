@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de secretarias</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#CrearSecretaria">Agregar secretaria <i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y apellido</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Teléfono</th>

                                <th>

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($secretarias as $secretaria)
                                <tr>
                                    <td>{{$secretaria->id}}</td>
                                    <td>{{$secretaria->name}}</td>
                                    <td>{{$secretaria->email}}</td>

                                    @if ($secretaria->documento != "")
                                        <td>{{$secretaria->documento}}</td>
                                    @else
                                        <td class="text-danger">NA</td>
                                    @endif

                                    @if ($secretaria->telefono != "")
                                        <td>{{$secretaria->telefono}}</td>
                                    @else
                                        <td class="text-danger">NA</td>
                                    @endif

                                    <td>
                                        <a href="editar-secretaria/{{$secretaria->id}}"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        <button class="btn btn-danger EliminarSecretaria"  Sid="{{$secretaria->id}}" Secretaria="{{$secretaria->name}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal --}}
    <div id="CrearSecretaria" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Nombre y apellido</h2>
                                <input type="text" class="form-control input-lg" name="name" required value="{{old('name')}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un nombre valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Email</h2>
                                <input type="email" class="form-control input-lg" name="email" required value="{{old('email')}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un email valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Docmuento</h2>
                                <input type="text" class="form-control input-lg" name="documento" value="{{old('documento')}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un documento valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Teléfono</h2>
                                <input type="text" class="form-control input-lg" name="telefono" value="{{old('telefono')}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un telefono valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Contraseña</h2>
                                <input type="text" class="form-control input-lg" name="password" required>
                                @error('name')
                                    <small class="text-danger">Ingrese una contraseña valida</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Crear <i class="fa fa-plus"></i></button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Editar secretaria --}}
    <div id="EditarSecretaria" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('actualizar-secretaria/'.$secretaria->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Nombre y apellido</h2>
                                <input type="text" class="form-control input-lg" name="name" required value="{{$secretaria->name}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un nombre valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Email</h2>
                                <input type="email" class="form-control input-lg" name="email" required value="{{$secretaria->email}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un email valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Docmuento</h2>
                                <input type="text" class="form-control input-lg" name="documento" value="{{$secretaria->documento}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un documento valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Teléfono</h2>
                                <input type="text" class="form-control input-lg" name="telefono" value="{{$secretaria->telefono}}">
                                @error('name')
                                    <small class="text-danger">Ingrese un telefono valido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Nueva contraseña</h2>
                                <input type="text" class="form-control input-lg" name="passwordN">
                                <input type="hidden" name="password" value="{{$secretaria->password}}">
                                @error('name')
                                    <small class="text-danger">Ingrese una contraseña valida</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Editar <i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection