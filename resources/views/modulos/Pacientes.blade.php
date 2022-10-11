@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de pacientes</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <a href="crear-paciente"><button class="btn btn-primary btn-lg">Agregar paciente</button></a>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped dt-responsive dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Documento</th>

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{$paciente->id}}</td>
                                    <td>{{$paciente->name}}</td>
                                    <td>{{$paciente->email}}</td>
                                    @if ($paciente->telefono != "")
                                        <td>{{$paciente->telefono}}</td>
                                    @else
                                        <td>NA</td>
                                    @endif
                                    <td>{{$paciente->documento}}</td>

                                    <td>
                                        <a href="editar-paciente/{{$paciente->id}}"><button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection