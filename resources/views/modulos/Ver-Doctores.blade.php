@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Doctores del consultorio <br> <b>{{ $consultorio->consultorio }}</b></h1>
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

                            @foreach ($horarios as $horario)
                                @foreach ($doctores as $doctor)
                                    @if ($horario->id_doctor == $doctor->id)
                                        <tr>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            @if ($doctor->telefono != '')
                                                <td>{{ $doctor->telefono }}</td>
                                            @else
                                                <td>NA</td>
                                            @endif


                                            <td>{{ $horario->horaInicio }} - {{ $horario->horaFin }}</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-primary">Agenda de citas</button>
                                                </a>
                                            </td>
                                    @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
