<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="same-origin">
    <meta name="robots" content="noindex,nofollow,notranslate">
    <meta name="google" content="notranslate">

    <link rel="icon" href="{{ url('/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="./themes/blueberry/jquery/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="js/vendor/codemirror/lib/codemirror.css?v=5.2.2">
    <link rel="stylesheet" type="text/css" href="js/vendor/codemirror/addon/hint/show-hint.css?v=5.2.2">
    <link rel="stylesheet" type="text/css" href="js/vendor/codemirror/addon/lint/lint.css?v=5.2.2"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/solid.css">
    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/brands.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">
    <title>@yield('title', 'CV de alumnos')</title>

    <noscript>
        <style>
            html {
                display: block
            }
        </style>
    </noscript>
</head>

<body style="margin-bottom: 27.5625px; margin-left: 240px; padding-top: 83.2812px;">
    <div id="pma_navigation" class="d-print-none" data-config-navigation-width="240" style="width: 240px;">
        <div id="pma_navigation_resizer" style="left: 240px; width: 3px;"></div>
        <div id="pma_navigation_content">
            <div id="pma_navigation_header">
                <div id="pmalogo">
                    <a href="{{ route('main.index') }}">
                        <h1>@yield('nav', 'CV de alumnos')</h1>
                    </a>
                </div>
            </div>
            <div id="pma_navigation_tree" class="list_container synced highlight autoexpand" style="height: 858.281px;">
                <div id="pma_navigation_tree_content" style="height: 805.078px;">
                    <ul>
                        <li class="database">
                            <a class="hover_show_full" href="{{ route('alumno.index') }}" title="Alumno">Alumnos</a>
                        </li>
                        <li class="database">
                            <a class="hover_show_full" href="{{ route('alumno.create') }}" title="Alumno">Añadir alumno</a>
                        </li>
                        @yield('nav-items')
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <noscript>
        <div class="alert alert-danger" role="alert">
            ¡Pasado este punto, debe tener Javascript activado!
        </div>

    </noscript>
    <div id="floating_menubar" class="d-print-none" style="margin-left: 243px; left: 0px; position: fixed; top: 0px; width: 100%; z-index: 99;">
        <div id="topmenucontainer" class="menucontainer">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" style="width: auto; overflow: visible;">
                    <ul id="topmenu" class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-nowrap disableAjax" href="{{ route('main.index') }}">
                                Inicio
                            </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Alumnos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('alumno.index') }}">Todos los alumnos</a></li>
                                <li><a class="dropdown-item" href="{{ route('alumno.create') }}">Añadir alumno</a></li>
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div id="page_content">
        <!-- Bloque para mostrar errores -->
        @error('general')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror

        <!-- Bloque para mostrar aciertos -->
        @if(session('general'))
        <div class="alert alert-success">
            {{ session('general') }}
        </div>
        @endif

        <!-- Bloque de contenido -->
        <div id="maincontainer">
            @yield('content')
        </div>
    </div>
    <script src="{{ url('/assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>