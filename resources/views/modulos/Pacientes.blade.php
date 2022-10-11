@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de pacientes</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary btn-lg">Agregar paciente</button>
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
                            <tr>
                                <td>1</td>
                                <td>Karen Villatoro</td>
                                <td>karen@villatoro.com</td>
                                <td>5555555</td>
                                <td>2899031430505</td>

                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection