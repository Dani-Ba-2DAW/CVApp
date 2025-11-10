@extends('template.base')

@section('content')
<div class="container mt-5 alumnos-index">

    <h2 class="text-center mb-4">Listado de Alumnos</h2>

    <div class="alumnos-grid">
        @foreach ($alumnos as $alumno)
            <div class="alumno-card">
                <div class="alumno-foto">
                    <img src="{{ route('image.view', $alumno->id) }}" alt="{{ $alumno->nombre }}">
                </div>

                <div class="alumno-info">
                    <h4>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h4>
                    <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
                    <p><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'No disponible' }}</p>
                    <p><strong>Nota media:</strong> {{ $alumno->nota_media ?? '—' }}</p>

                    <div class="alumno-actions">
                        <a href="{{ route('alumno.show', $alumno) }}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection