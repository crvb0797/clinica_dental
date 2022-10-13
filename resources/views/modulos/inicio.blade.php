@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Inicio</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6 bg-primary">
                        <h1>Bienvenidos</h1>
                        <hr>
                        <h2>Días de atención:</h2>
                        <h3>{{$inicio->dias}}</h3>

                        <hr>
                        <h2>Horarios de atención:</h2>
                        <h3>Desde: {{$inicio->horaInicio}}</h3>
                        <h3>Hasta: {{$inicio->horaFin}}</h3>

                        <hr>
                        <h2>Dirección:</h2>
                        <h3>{{$inicio->direccion}}</h3>

                        <hr>
                        <h2>Contactanos: </h2>
                        <h3>{{$inicio->telefono}}</h3>
                        <h3>{{$inicio->email}}</h3>
                    </div>

                    <div class="col-md-6">
                        <img class="img-responsive" src="{{asset('storage/'.$inicio->logo)}}" width="200px" alt="Logo">
                    </div>
                </div>

                @if (auth()->user()->rol == "Administrador")
                    <div class="box-footer">
                        <a href="{{url('inicio-editar')}}"><button class="btn btn-primary btn-lg">Editar <i class="fa fa-pencil"></i></button></a>
                    </div>
                @endif

            </div>
        </section>
    </div>
@endsection