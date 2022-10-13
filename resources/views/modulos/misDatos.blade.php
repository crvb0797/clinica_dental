@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Mis datos personales</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h2>Nombre y apellido</h2>
                                <input class="form-control input-lg" type="text" name="name"
                                    value="{{ auth()->user()->name }}">

                                <h2>Email</h2>
                                <input class="form-control input-lg" type="email" name="email"
                                    value="{{ auth()->user()->email }}">
                                @error('email')
                                    <p class="alert alert-danger">Ingrese un email valido</p>
                                @enderror

                                <h2>Nueva contraseña</h2>
                                <input class="form-control input-lg" type="text" name="passwordN" value="">
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <h2>Documento</h2>
                                <input class="form-control input-lg" type="text" name="documento"
                                    value="{{ auth()->user()->documento }}">

                                <h2>Teléfono</h2>
                                <input class="form-control input-lg" type="text" name="telefono"
                                    value="{{ auth()->user()->telefono }}">
                            </div>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar <i class="fa fa-plus"></i></button>

                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
