@extends('plantilla')

@section('contenido')
    <div class="login-box">
        <div class="login-logo">
            <b>Clínica dental</b>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Ingresar al sistema</p>
            <form metohd="POST" action="{{ route('inicio') }}">
                @csrf
                {{-- CORREO DEL USUARIO --}}
                <div class="form-group has-feedback">
                    <input type="email" name="Correo Electrónico" class="form-control" required value="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group has-feedback">
                    <input type="password" name="Contraseña" class="form-control" required value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection