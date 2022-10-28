<div class="form-group">
    {!! Form::label('name', 'Nombre de la publicación:') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre de la publicación...',
    ]) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="col form-group">
    {!! Form::label('file', 'Imagen de la publicación: ') !!}
    {!! Form::file('file', null, ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
    <p>La imagen para la publicación debe de llevar una medida de 350px de ancho por 500px de alto y no
        debe pesar más de 1MB esto para evitar la carga lenta dentro de la aplicación</p>
    @error('file')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
