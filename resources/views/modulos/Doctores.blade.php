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
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Consultorio</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Teléfono</th>

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Carlos Villatoro</td>
                                <td>Odontología 1</td>
                                <td>carlos@villatoro.dev</td>
                                <td>2899021420101</td>
                                <td>5555 - 5555</td>

                                <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
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