@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Crear Publicación</h1>
        </section>

        <section class="content">
            <div class="box">

                <div class="box-header">
                    <a href="{{ route('admin.posts.index') }}"><button class="btn btn-primary btn-lg">Regresar</button></a>
                </div>

                <div class="box-body">
                    {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    
                        @include('admin.posts.partials.form')

                    {!! Form::submit('Crear publicación', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
        </section>
    </div>
@endsection
