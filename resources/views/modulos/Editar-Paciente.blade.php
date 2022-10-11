@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Editar Paciente: {{$paciente->name}}</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <a href="{{url('pacientes')}}">
                    <button class="btn btn-primary">Volver a pacientes</button></a>
                </div>

                <div class="box-body">
                    <form action="{{url('actualizar-paciente/'.$paciente->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <h2>Nombre y apellido</h2>
                        <input type="text" class="form-control input-lg" name="name" value="{{$paciente->name}}">

                        <h2>Documento:</h2>
                        <input type="text" class="form-control input-lg" name="documento" value="{{$paciente->documento}}">

                        <h2>email:</h2>
                        <input type="email" class="form-control input-lg" name="email" value="{{$paciente->email}}">

                        <h2>Nueva contraseña: </h2>
                        <input type="text" class="form-control input-lg" name="passwordN" value="">
                        <br>
                        <input type="hidden" class="form-control input-lg" name="password" value="{{$paciente->password}}">

                        <h2>Teléfono: </h2>
                        <input type="text" class="form-control input-lg" name="telefono" value="{{$paciente->telefono}}">

                        <br>
                        <br>

                        <button class="btn btn-primary">Actualizar <i class="fa fa-pencil"></i></button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection