@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de doctores</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Consultorio</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Teléfono</th>

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Carlos Villatoro</td>
                                <td>Odontología 1</td>
                                <td>carlos@villatoro.dev</td>
                                <td>2899021420101</td>
                                <td>5555 - 5555</td>

                                <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    {{-- Modal de crear --}}
    <div id="CrearDoctor" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Nombre y apellido: </h2>
                                <input type="text" class="form-control input-lg" name="name">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection