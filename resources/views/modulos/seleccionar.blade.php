@extends('plantilla')

@section('contenido')

<section class="content">
    <center>
        <h1>Seleccione como desea ingresar al sistema</h1>
    </center>

    <div class="row">
        {{-- SECRETARIA --}}
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #f781d8; color:white">
                <div class="inner">
                    <h3>Secretaria</h3>
                    <p>Inicie sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
                <a href="{{route('login')}}" class="small-box-footer">
                    Ingresar <div class="fa fa-arrow-circle-right"></div>
                </a>
            </div>
        </div>

        {{-- DOCTOR --}}
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #bdbdbd; color:white">
                <div class="inner">
                    <h3>Doctor</h3>
                    <p>Inicie sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>
                <a href="{{route('login')}}" class="small-box-footer">
                    Ingresar <div class="fa fa-arrow-circle-right"></div>
                </a>
            </div>
        </div>

        {{-- PACIENTE --}}
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{route('login')}}</h3>
                    <p>Inicie sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="ingresar" class="small-box-footer">
                    Ingresar <div class="fa fa-arrow-circle-right"></div>
                </a>
            </div>
        </div>

         {{-- ADMINISTRADOR --}}
         <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Administrador</h3>
                    <p>Inicie sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a href="{{route('login')}}" class="small-box-footer">
                    Ingresar <div class="fa fa-arrow-circle-right"></div>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection