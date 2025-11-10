@extends('template.base')

@section('content')
<form action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- enctype="application/x-www-form-urlencoded" -->
    <label for="nombre">Nombre:</label>
    <input required id="nombre" type="text" name="nombre" class="form-control" minlength="2" maxlength="50" placeholder="Introduce el nombre" value="{{ old('nombre') }}">
    <label for="apellidos">Apellidos:</label>
    <input required id="apellidos" type="text" name="apellidos" class="form-control" minlength="2" maxlength="80" placeholder="Introduce los apellidos" value="{{ old('apellidos') }}">
    <label for="telefono">Teléfono:</label>
    <input id="telefono" type="text" name="telefono" class="form-control" maxlength="20" placeholder="Ej: +34 600 123 456" value="{{ old('telefono') }}">
    <label for="correo">Correo electrónico:</label>
    <input required id="correo" type="email" name="correo" class="form-control" minlength="6" maxlength="100" placeholder="ejemplo@correo.com" value="{{ old('correo') }}">
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
    <label for="nota_media">Nota media:</label>
    <input id="nota_media" type="number" name="nota_media" class="form-control" step="0.01" min="0" max="10" placeholder="Ej: 8.75" value="{{ old('nota_media') }}">
    <label for="experiencia">Experiencia:</label>
    <textarea id="experiencia" name="experiencia" class="form-control" rows="3" maxlength="1000" placeholder="Describe tu experiencia profesional...">{{ old('experiencia') }}</textarea>
    <label for="formacion">Formación:</label>
    <input id="formacion" type="text" name="formacion" class="form-control" maxlength="255" placeholder="Ej: Grado en Ingeniería Informática" value="{{ old('formacion') }}">
    <label for="habilidades">Habilidades:</label>
    <textarea id="habilidades" name="habilidades" class="form-control" rows="2" maxlength="500" placeholder="Ej: Comunicación, liderazgo, trabajo en equipo...">{{ old('habilidades') }}</textarea>
    <label for="imagen">Habilidades:</label>
    <div id="drop-area">
        <p>Arrastra y suelta tu imagen aquí</p>
        <p>o haz clic para seleccionar</p>
        <input id="imagen" type="file" name="imagen" class="form-control" accept="image/*">
        <div id="preview"></div>
    </div>
    <input type="submit" value="Create new post" class="btn btn-primary">
</form>
@endsection