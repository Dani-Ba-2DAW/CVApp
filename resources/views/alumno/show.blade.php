@extends('template.base')

@section('scripts')
<script src="https://kit.fontawesome.com/ec3e7e2cc5.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="container mt-5 alumno-show">

    <div class="alumno-detalle">
        <div class="alumno-imagen">
            <img src="{{ route('image.view', $alumno->id) }}" alt="{{ $alumno->nombre }}">
        </div>

        <div class="alumno-datos">
            <h2>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h2>
            <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'No disponible' }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento ? \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') : '—' }}</p>
            <p><strong>Nota media:</strong> {{ $alumno->nota_media ?? '—' }}</p>
            <p><strong>Formación:</strong> {{ $alumno->formacion ?? '—' }}</p>

            @if ($alumno->experiencia)
                <div class="alumno-bloque">
                    <h4>Experiencia</h4>
                    <p>{{ $alumno->experiencia ?? '—' }}</p>
                </div>
            @endif

            @if ($alumno->habilidades)
                <div class="alumno-bloque">
                    <h4>Habilidades</h4>
                    <p>{{ $alumno->habilidades ?? '—' }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection