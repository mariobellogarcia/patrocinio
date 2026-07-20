<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Panel de administración')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
</head>

<body class="min-h-screen bg-[var(--color-background)] text-slate-900">

    {{-- Menú superior --}}
<x-app-header mode="admin" />
    <div
        class="mx-auto flex min-h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8"
    >

        <nav class="flex items-center gap-3">

            <a
                href="#"
                class="rounded-lg px-4 py-2 text-sm font-bold text-white no-underline transition hover:bg-white/15"
            >
                Jugadores
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="m-0"
            >
                @csrf

                <button
                    type="submit"
                class="rounded-lg px-4 py-2 text-sm font-bold text-white no-underline transition hover:bg-white/15"
                
                >
                    Cerrar sesión
                </button>
            </form>

        </nav>
    </div>
</header>

    {{-- Contenido principal --}}
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        @if (session('success'))
            <div
                class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-800"
            >
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>