@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Crear paciente</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <a href="{{url('pacientes')}}">
                        <button class="btn btn-primary">Volver a pacientes</button></a>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <h2>Nombre y apellido: </h2>
                            <input type="text" name="name" class="form-control input-lg">
                        </div>

                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" name="documento" class="form-control input-lg">
                        </div>

                        <div class="form-group">
                            <h2>Email: </h2>
                            <input type="text" name="email" class="form-control input-lg" value="{{old('email')}}">
                            @error('email')
                                <div class="alert alert-danger">Insertar un correo valido</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h2>Teléfono:</h2>
                            <input type="text" name="telefono" class="form-control input-lg">
                        </div>

                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="text" name="password" class="form-control input-lg">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-lg">Agregar <i class="fa fa-plus"></i></button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection