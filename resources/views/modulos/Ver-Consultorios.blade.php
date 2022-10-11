@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Consultorios</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    @foreach ($consultorios as $consultorio)
                        
                        <div class="col-lg-3 col-xs-6">
                            <a href="">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{$consultorio->consultorio}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection