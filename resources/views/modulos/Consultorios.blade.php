@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de consultorios</h1>
        </section>

        <section class="content">
            <div class="box">
                <br>

                <form method="POST" action="">
                    @csrf
                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" name="consultorio" placeholder="Ingrese nuevo consultorio" required>
                    </div>

                    <button class="btn btn-primary" type="submit">Agregar consultorio</button>
                </form>

                <br>

                <div class="box-body">
                    @foreach ($consultorios as $consultorio)
                        <div class="row">
                            <form action="{{url('consultorio/' .$consultorio->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="consultorioE" value="{{$consultorio->consultorio}}">
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-success" type="submit">Editar <i class="fa fa-pencil"></i></button>
                                </div>
                            </form>
                            
                            <div class="col-md-1">
                                <form action="{{url('eliminar-consultorio/' . $consultorio->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar <i class="fa fa-pencil"></i></button>
                                </form>
                            </div>
                        </div>

                        <br>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection