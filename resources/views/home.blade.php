<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Escuela de Fútbol Patrocinio
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-background">

<x-app-header mode="public" />
    <main>

        <section class="hero-background flex min-h-screen items-center px-6 py-20">

            <div class="mx-auto w-full max-w-7xl">

                <div class="max-w-3xl">

                    <p class="text-primary text-sm font-bold uppercase tracking-[0.25em]">
                        Escuela CDEF Patrocinio
                    </p>

                    <h1 class="mt-5 text-4xl font-black leading-tight text-club sm:text-5xl lg:text-6xl">
                        Bienvenido a la Escuela de Fútbol Patrocinio
                    </h1>

                    <p class="text-primary mt-6 max-w-2xl text-lg leading-8">
                        Realiza la inscripción de jugadores de forma sencilla,
                        organizada y segura.
                    </p>

                    <a
                        href="{{ route('registrations.create') }}"
                        class="mt-8 inline-flex rounded-xl bg-white px-6 py-3 font-bold text-brand-dark shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-purple-50"
                    >
                        Realizar inscripción
                    </a>

                </div>

            </div>

        </section>

    </main>

</body>

</html>