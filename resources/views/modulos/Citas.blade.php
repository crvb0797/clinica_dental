@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h2>Horarios</h2>

            @if ($horarios == null)
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            Desde <input type="time" class="form-control" name="horaInicio">
                        </div>
                        <div class="col-md-2">
                            Hasta <input type="time" class="form-control" name="horaFin">
                        </div>

                        <br>

                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">Guardar <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            @else
                @foreach ($horarios as $hora)
                <form action="{{url('editar-horario/'.$hora->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-2">
                            Desde <input type="time" class="form-control" name="horaInicioE" value="{{$hora->horaInicio}}">
                        </div>
                        <div class="col-md-2">
                            Hasta <input type="time" class="form-control" name="horaFinE" value="{{$hora->horaFin}}">
                        </div>
    
                        <br>
    
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">Editar <i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                </form>    
                @endforeach
            @endif
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div id="calendario"></div>
                </div>
            </div>
        </section>
    </div>
@endsection