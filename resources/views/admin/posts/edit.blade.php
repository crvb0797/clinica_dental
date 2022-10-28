@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Editar Publicación</h1>
        </section>

        <section class="content">
            <div class="box">

                <div class="box-header">
                    <a href="{{route('admin.posts.index')}}"><button class="btn btn-primary btn-lg">Regresar</button></a>
                </div>

                <div class="box-body">
                    {!! Form::model($post,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
                    
                        @include('admin.posts.partials.form')

                    {!! Form::submit('Actualizar publicación', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection