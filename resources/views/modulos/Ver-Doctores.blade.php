@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Doctores del consultorio <br> <b>{{$consultorio->consultorio}}</b></h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre y apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Horario</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($doctores as $doctor)
                                <tr>
                                    <td>{{$doctor->name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    @if ($doctor->telefono != "")
                                        <td>{{$doctor->telefono}}</td>
                                    @else
                                        <td>NA</td>
                                    @endif
                                    @foreach ($horarios as $horario)
                                        @if ($horario->id_doctor == $doctor->id)
                                            <td>{{$horario->horaInicio}} - {{$horario->horaFin}}</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-primary">Agenda de citas</button>
                                                </a>
                                            </td>
                                        @else
                                            <td>Aun no registrado</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-primary" disabled>Agenda de citas</button>
                                                </a>
                                            </td>
                                        @endif
                                    @endforeach
                                    

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection