<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GUMADOC') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- DataTables CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">

        <!-- Bootstrap 5.3 (con soporte completo de modo oscuro) -->        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <!-- CLASES PERSONALIZADAS GLOBALES -->
        <style>
            .daterangepicker td.active, .daterangepicker td.active:hover {
                background-color: #e7551f;
                border-color: transparent;
                color: #fff;
            }

            .daterangepicker td.in-range {
                background-color: #FCCCFC;
            }
            .daterangepicker {
                background-color: #1F2937;
                border: 1px solid #1F2937;
            }
            .daterangepicker .calendar-table {
                border: 1px solid #1F2937;
                background-color: #1F2937;
            }
            .daterangepicker.show-ranges.ltr .drp-calendar.left {
                border-left: 1px solid #1F2937;
            }
            .daterangepicker .calendar-table table {
                background-color: #1F2937;
            }
            .daterangepicker td.off, .daterangepicker td.off.in-range, .daterangepicker td.off.start-date, .daterangepicker td.off.end-date {
                background-color: #1F2937;
            }
            .input-fecha {
                height: 40px !important;
            }
            
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-vh-100 bg-body">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-body-secondary shadow-sm">
                    <div class="container-fluid py-3 px-4 d-flex justify-content-between align-items-center">
                        {{ $header }}
                        <button id="theme-toggle" class="btn btn-outline-secondary btn-sm" type="button">
                            <i id="theme-icon" data-feather="sun"></i>
                        </button>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- DataTables JS-->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        // Cargar tema antes de que se renderice la página
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();

        // Inicializar después de que el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar Feather Icons
            feather.replace();

            // Modo oscuro
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const htmlElement = document.documentElement;

            // Actualizar icono inicial
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            updateThemeIcon(currentTheme);

            // Toggle theme
            if (themeToggle) {
                themeToggle.addEventListener('click', () => {
                    const currentTheme = htmlElement.getAttribute('data-bs-theme');
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                    
                    htmlElement.setAttribute('data-bs-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    updateThemeIcon(newTheme);
                });
            }

            function updateThemeIcon(theme) {
                if (themeIcon) {
                    themeIcon.setAttribute('data-feather', theme === 'light' ? 'moon' : 'sun');
                    feather.replace();
                }
            }
        });
    </script>

    @yield('metodosjs')
</html>
