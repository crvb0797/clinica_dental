@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de doctores</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Consultorio</th>
                                <th>Email</th>
                                <th>Teléfono</th>

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($doctores as $doctor)

                                @if ($doctor->rol == "Doctor")
                                    <tr>
                                        <td>{{$doctor->id}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->Consultorio->consultorio}}</td>
                                        <td>{{$doctor->email}}</td>

                                        @if ($doctor->telefono != "")
                                            <td>{{$doctor->telefono}}</td>
                                        @else
                                            <td>NA</td>
                                        @endif

                                        <td>
                                            <button class="btn btn-danger EliminarDoctor" Did="{{$doctor->id}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    {{-- Modal de crear --}}
    <div id="CrearDoctor" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Nombre y apellido: </h2>
                                <input type="text" class="form-control input-lg" name="name" required>
                                @error('name')
                                    <div class="alert alert-danger">Insertar un nombre valido</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Genero: </h2>
                                <select class="form-control input-lg" name="sexo" required>
                                    <option value="">Seleccionar genero</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <h2>Consultorio: </h2>
                                <select class="form-control input-lg" name="id_consultorio" required>
                                    <option value="">Seleccionar consultorio</option>
                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->consultorio}}</option>
                                    @endforeach
                                </select>
                                @error('id_consultorio')
                                    <div class="alert alert-danger">{{error}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Email: </h2>
                                <input type="email" class="form-control input-lg" name="email" value="{{old('email')}}" required>
                                @error('email')
                                    <div class="alert alert-danger">Insertar un correo valido</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h2>Contraseña: </h2>
                                <input type="text" class="form-control input-lg" name="password" required>
                                @error('pasword')
                                    <div class="alert alert-danger">Insertar una contraseña valida</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear <i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection