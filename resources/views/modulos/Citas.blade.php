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

    {{-- Modal --}}
    <div class="modal fade" id="CitaModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Seleccionar Paciente</h2>
                                <select name="" id=""></select>
                            </div>

                            <div class="form-group">
                                <h2>Fecha</h2>
                                <input type="text" class="form-control input-lg" id="Fecha" readonly></input>
                            </div>

                            <div class="form-group">
                                <h2>Hora</h2>
                                <input type="text" class="form-control input-lg" id="Hora" readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-primary">Pedir Cita</button>
                        <button  type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection