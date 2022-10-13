@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Editar información de la clinica</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h2>Días:</h2>
                                <input type="text" name="dias" class="input-lg form-control" value="{{$inicio->dias}}">

                                <div class="form-group">
                                    <h2>Horarios:</h2>
                                    Desde: <input type="time" class="input-lg form-control" name="horaInicio" value="{{$inicio->horaInicio}}">
                                    Hasta: <input type="time" class="input-lg form-control" name="horaFin" value="{{$inicio->horaFin}}">
                                </div>

                                <h2>Dirección: </h2>
                                <input type="text" class="input-lg form-control" name="direccion" value="{{$inicio->direccion}}">

                                <h2>Teléfono: </h2>
                                <input type="text" class="input-lg form-control" name="telefono" value="{{$inicio->telefono}}">

                                <h2>Email: </h2>
                                <input type="text" class="input-lg form-control" name="email" value="{{$inicio->email}}">
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <h2>Logo: </h2>
                                <input type="file" name="logoN">

                                <br>

                                <img src="{{asset('storage/'.$inicio->logo)}}" width="200px" alt="Logo">
                                <input type="hidden" name="logoActual" value="{{$inicio->logo}}">

                                <br>

                                <button type="submit" class="btn btn-primary">Editar <i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection