@extends('template.base')

@section('content')
<form action="{{ route('alumno.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="nombre">Nombre:</label>
    <input required id="nombre" type="text" name="nombre" class="form-control" minlength="2" maxlength="50" placeholder="Introduce el nombre" value="{{ old('nombre', $alumno->nombre) }}">
    @error('apellidos')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="apellidos">Apellidos:</label>
    <input required id="apellidos" type="text" name="apellidos" class="form-control" minlength="2" maxlength="80" placeholder="Introduce los apellidos" value="{{ old('apellidos', $alumno->apellidos) }}">
    @error('telefono')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="telefono">Teléfono:</label>
    <input id="telefono" type="text" name="telefono" class="form-control" maxlength="20" placeholder="Ej: +34 600 123 456" value="{{ old('telefono', $alumno->telefono) }}">
    @error('correo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="correo">Correo electrónico:</label>
    <input required id="correo" type="email" name="correo" class="form-control" minlength="6" maxlength="100" placeholder="ejemplo@correo.com" value="{{ old('correo', $alumno->correo) }}">
    @error('fecha_nacimiento')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
    @error('nota_media')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="nota_media">Nota media:</label>
    <input id="nota_media" type="number" name="nota_media" class="form-control" step="0.01" min="0" max="10" placeholder="Ej: 8.75" value="{{ old('nota_media', $alumno->nota_media) }}">
    @error('experiencia')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="experiencia">Experiencia:</label>
    <textarea id="experiencia" name="experiencia" class="form-control" rows="3" maxlength="1000" placeholder="Describe tu experiencia profesional...">{{ old('experiencia', $alumno->experiencia) }}</textarea>
    @error('formacion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="formacion">Formación:</label>
    <input id="formacion" type="text" name="formacion" class="form-control" maxlength="255" placeholder="Ej: Grado en Ingeniería Informática" value="{{ old('formacion', $alumno->formacion) }}">
    @error('habilidades')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="habilidades">Habilidades:</label>
    <textarea id="habilidades" name="habilidades" class="form-control" rows="2" maxlength="500" placeholder="Ej: Comunicación, liderazgo, trabajo en equipo...">{{ old('habilidades', $alumno->habilidades) }}</textarea>
    @error('imagen')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="imagen">Imagen:</label>
    <label id="drop-area">
        <p>Arrastra y suelta tu imagen aquí</p>
        <p>o haz clic para seleccionar</p>
        <input id="imagen" type="file" name="imagen" class="form-control" accept="image/*">
        <div id="preview">
            <img src="{{ route('image.view', $alumno->id) }}">
        </div>
    </label>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="deleteimage" name="deleteimage" value="delete">
        <label class="form-check-label" for="deleteimage">Delete image</label>
    </div>
    <input type="submit" value="Edit post" class="btn btn-primary">
</form>
@endsection