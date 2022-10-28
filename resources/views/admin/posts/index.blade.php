@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Publicaciones</h1>
        </section>

        <section class="content">
            <div class="box">

                <div class="box-header">
                    <a href="{{route('admin.posts.create')}}"><button class="btn btn-primary btn-lg">Nueva publiacación</button></a>
                </div>

                <div class="box-body">
                    <h1>Bienvenido</h1>

                    <table class="table table-bordered table-hover table-striped dt-responsive dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de la publicación</th>
                                <th></th>
                            </tr>
                        </thead>

                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>
                                <a href="{{route('admin.posts.edit', $post)}}"><button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                <button type="submit" class="EliminarPublicacion btn btn-danger" Pubid="{{$post->id}}" Publicacion="{{$post->name}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    </table>
            </div>
        </section>
    </div>
@endsection