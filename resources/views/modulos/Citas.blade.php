@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            @if ($doctor->sexo == "Femenino")
                <h2>Doctora: {{$doctor->name}}</h2>
            @else
                <h2>Doctor: {{$doctor->name}}</h2>
            @endif

            <h2>Horarios</h2>

            @if ($horarios == null)

                @if (auth()->user()->rol == "Doctor")
                    <form action="{{url('horarios')}}" method="POST">
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
                @endif
            @else
                @foreach ($horarios as $hora)
                    @if (auth()->user()->rol == "Doctor")    
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
                    @elseif(auth()->user()->rol == "Paciente")
                        <h2>{{$hora->horaInicio}} - {{$hora->horaFin}}</h2>
                    @endif
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
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Seleccionar Paciente</h2>
                                <select id="select2" name="id_paciente" required style="width: 100%">
                                    <option value="">Selecciónar pacinete...</option>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->rol == "Paciente")
                                            <option value="{{$paciente->id}}">{{$paciente->name}} - {{$paciente->documento}}</option>
                                        @endif
                                    @endforeach

                                    <input type="hidden" name="id_doctor" value="{{auth()->user()->id}}"></input>

                                </select>
                            </div>

                            <div class="form-group">
                                <h2>Fecha</h2>
                                <input type="text" class="form-control input-lg" id="Fecha" readonly></input>
                            </div>

                            <div class="form-group">
                                <h2>Hora</h2>
                                <input type="text" class="form-control input-lg" id="Hora" readonly></input>

                                <input type="hidden"  name="FyHinicio" class="form-control input-lg" id="FyHinicio" readonly></input>
                                <input type="hidden" name="FyHfinal"  class="form-control input-lg" id="FyHfinal" readonly></input>
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


    <div class="modal fade" id="EventoModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('borrar-cita')}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="form-group">
                            <h2>Paciente: </h2>
                            <h4 id="paciente"></h4>

                            <input type="hidden" id="idCita" name="idCita">

                            <?php
                                $exp = explode("/", $_SERVER["REQUEST_URI"]);
                                echo '<input type="hidden" name="idDoctor" value="'.$exp[2].'">';
                            ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Cancelar cita <i class="fa fa-warning"></i></button>
                        <button  type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Cita">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <?php
                                    $exp = explode("/", $_SERVER["REQUEST_URI"]);

                                    echo '<input type="hidden" name="id_doctor" value="'.$exp[2].'">';
                                ?>
                                
                                <input type="hidden" name="id_paciente" value="{{auth()->user()->id}}">
                            </div>

                            <div class="form-group">
                                <h2>Fecha:</h2>
                                <input type="text" id="FechaP" class="form-control input-lg" readonly>
                            </div>
                            <div class="form-group">
                                <h2>Hora:</h2>
                                <input type="text" id="HoraP" class="form-control input-lg" readonly>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="FyHinicioP" name="FyHinicio" class="form-control input-lg" readonly>
                                <input type="hidden" id="FyHfinalP" name="FyHfinal" class="form-control input-lg" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Pedir Cita</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection