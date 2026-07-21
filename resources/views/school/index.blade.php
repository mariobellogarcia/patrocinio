<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Conoce la Escuela CDEF Patrocinio: metodología, actividades, categorías, equipo técnico, instalaciones y precios."
    >

    <title>
        La Escuela | CDEF Patrocinio
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

</head>

<body class="min-h-screen bg-background text-text-primary">

    {{-- CABECERA PÚBLICA --}}
    <x-app-header mode="public" />

    <main>

        {{-- ========================================================= --}}
        {{-- HERO PRINCIPAL --}}
        {{-- ========================================================= --}}

        <section class="relative overflow-hidden px-6 pb-20 pt-16 lg:pb-28 lg:pt-24">

            <div
                class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-purple-100 blur-3xl"
            ></div>

            <div class="relative mx-auto grid w-full max-w-7xl items-center gap-14 lg:grid-cols-2">

                <div>

                    <p class="text-sm font-black uppercase tracking-[0.25em] text-club">
                        Escuela CDEF Patrocinio
                    </p>

                    <h1 class="mt-5 text-4xl font-black leading-tight text-text-primary sm:text-4xl lg:text-5xl">

                        Mucho más que una

                        <span class="block text-club">
                            escuela de fútbol
                        </span>

                    </h1>

                    <p class="mt-7 max-w-2xl text-lg leading-8 text-text-secondary">
                        Ayudamos a cada jugador a mejorar deportiva y personalmente
                        mediante entrenamientos adaptados, educación en valores y una
                        metodología centrada en su evolución.
                    </p>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">

                        <a
                            href="{{ route('registrations.create') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-club px-8 py-4 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-club-dark"
                        >
                            Realizar inscripción
                        </a>

                        <a
                            href="#actividades"
                            class="inline-flex items-center justify-center rounded-xl border-2 border-club px-8 py-4 font-bold text-club transition duration-300 hover:bg-club hover:text-white"
                        >
                            Ver actividades
                        </a>

                    </div>

                    <div class="mt-12 grid max-w-xl grid-cols-3 gap-6 border-t border-gray-200 pt-8">

                        <div>

                            <p class="text-3xl font-black text-club">
                                7
                            </p>

                            <p class="mt-1 text-sm font-semibold text-text-secondary">
                                Categorías en la escuela
                            </p>

                        </div>

                        <div>

                            <p class="text-3xl font-black text-club">
                                1
                            </p>

                            <p class="mt-1 text-sm font-semibold text-text-secondary">
                                Equipo senior
                            </p>

                        </div>

                        <div>

                            <p class="text-3xl font-black text-club">
                                100%
                            </p>

                            <p class="mt-1 text-sm font-semibold text-text-secondary">
                                Formación
                            </p>

                        </div>

                    </div>

                </div>

                <div class="relative">

                    <div class="aspect-[4/3] overflow-hidden rounded-3xl">

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt=""
                            class="h-full w-full object-cover"
                        >

                    </div>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- QUIÉNES SOMOS --}}
        {{-- ========================================================= --}}

        <section
            id="quienes-somos"
            class="border-y border-gray-200 bg-white px-6 py-20 lg:py-28"
        >

            <div class="mx-auto grid max-w-7xl items-center gap-16 lg:grid-cols-2">

                <div class="order-2 lg:order-1">

                    <div class="grid grid-cols-2 gap-4">

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt=""
                            class="mt-10 h-80 w-full rounded-3xl object-cover"
                        >

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt=""
                            class="mt-10 h-80 w-full rounded-3xl object-cover"
                        >

                    </div>

                </div>

                <div class="order-1 lg:order-2">

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Quiénes somos
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-text-primary sm:text-4xl">
                        Una escuela comprometida con el desarrollo integral
                    </h2>

                    <p class="mt-7 text-lg leading-8 text-text-secondary">
                        La Escuela CDEF Patrocinio nace con el objetivo de ofrecer una
                        formación deportiva de calidad, accesible y adaptada a las
                        necesidades de niños y jóvenes.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-text-secondary">
                        Nuestro trabajo no se limita únicamente al aprendizaje del
                        fútbol. Queremos que nuestros jugadores crezcan también como
                        personas, aprendiendo valores como el respeto, el compromiso,
                        el compañerismo y la responsabilidad.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-text-secondary">
                        Cada entrenamiento está planificado para mejorar la técnica,
                        la coordinación, la toma de decisiones y la comprensión del
                        juego, respetando siempre el ritmo de evolución de cada jugador.
                    </p>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- FILOSOFÍA Y VALORES --}}
        {{-- ========================================================= --}}

        <section class="px-6 py-20 lg:py-28">

            <div class="mx-auto max-w-7xl">

                <div class="max-w-3xl">

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Nuestra filosofía
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-text-primary sm:text-4xl">
                        El jugador es el centro de todo el proceso
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-text-secondary">
                        Nuestra metodología se adapta a la edad, el nivel y las
                        necesidades de cada jugador para favorecer una evolución
                        progresiva, segura y motivadora.
                    </p>

                </div>

                <div class="mt-14 grid gap-10 border-t border-gray-200 pt-12 md:grid-cols-2 lg:grid-cols-4">

                    <article>

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100 text-club">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v6l4 2"
                                />
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Evolución progresiva
                        </h3>

                        <p class="mt-3 leading-7 text-text-secondary">
                            Respetamos el ritmo de aprendizaje de cada jugador y
                            establecemos objetivos realistas.
                        </p>

                    </article>

                    <article>

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100 text-club">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-5-4M9 20H2v-2a4 4 0 017-2.65M9 11a4 4 0 100-8 4 4 0 000 8zm8 1a3 3 0 100-6 3 3 0 000 6z"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Trabajo en equipo
                        </h3>

                        <p class="mt-3 leading-7 text-text-secondary">
                            Enseñamos a colaborar, comunicarse y respetar a compañeros,
                            entrenadores y rivales.
                        </p>

                    </article>

                    <article>

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100 text-club">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Compromiso
                        </h3>

                        <p class="mt-3 leading-7 text-text-secondary">
                            Promovemos la constancia, la responsabilidad y el esfuerzo
                            como base de cualquier mejora.
                        </p>

                    </article>

                    <article>

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100 text-club">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 21C12 21 4 16.5 4 10a4 4 0 017-2.65A4 4 0 0118 10c0 6.5-6 11-6 11z"
                                />
                            </svg>

                        </div>

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Educación en valores
                        </h3>

                        <p class="mt-3 leading-7 text-text-secondary">
                            Utilizamos el deporte como herramienta educativa y de
                            crecimiento personal.
                        </p>

                    </article>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- ACTIVIDADES --}}
        {{-- ========================================================= --}}

        <section
            id="actividades"
            class="bg-white px-6 py-20 lg:py-28"
        >

            <div class="mx-auto max-w-7xl">

                <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">

                    <div>

                        <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                            Qué ofrecemos
                        </p>

                        <h2 class="mt-4 text-3xl font-black leading-tight text-text-primary sm:text-4xl">
                            Entrenamientos para todas las necesidades
                        </h2>

                        <p class="mt-6 text-lg leading-8 text-text-secondary">
                            Diferentes actividades dirigidas al aprendizaje, la mejora
                            técnica y el desarrollo completo del jugador.
                        </p>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Actividades de la Escuela CDEF Patrocinio"
                            class="mt-10 h-80 w-full rounded-3xl object-cover"
                        >

                    </div>

                    <div class="divide-y divide-gray-200 border-y border-gray-200">

                        <article class="grid gap-4 py-8 sm:grid-cols-[70px_1fr]">

                            <span class="text-4xl font-black text-purple-200">
                                01
                            </span>

                            <div>

                                <h3 class="text-2xl font-black text-text-primary">
                                    Fútbol
                                </h3>

                                <p class="mt-3 leading-7 text-text-secondary">
                                    Entrenamientos orientados al aprendizaje técnico,
                                    táctico y físico, adaptados a cada categoría.
                                </p>

                            </div>

                        </article>

                        <article class="grid gap-4 py-8 sm:grid-cols-[70px_1fr]">

                            <span class="text-4xl font-black text-purple-200">
                                02
                            </span>

                            <div>

                                <h3 class="text-2xl font-black text-text-primary">
                                    Fútbol sala
                                </h3>

                                <p class="mt-3 leading-7 text-text-secondary">
                                    Trabajo de control, pase, movilidad, velocidad de
                                    ejecución y toma de decisiones en espacios reducidos.
                                </p>

                            </div>

                        </article>

                        <article class="grid gap-4 py-8 sm:grid-cols-[70px_1fr]">

                            <span class="text-4xl font-black text-purple-200">
                                03
                            </span>

                            <div>

                                <h3 class="text-2xl font-black text-text-primary">
                                    Tecnificación
                                </h3>

                                <p class="mt-3 leading-7 text-text-secondary">
                                    Sesiones centradas en mejorar el dominio del balón,
                                    conducción, regate, pase, golpeo y finalización.
                                </p>

                            </div>

                        </article>

                        <article class="grid gap-4 py-8 sm:grid-cols-[70px_1fr]">

                            <span class="text-4xl font-black text-purple-200">
                                04
                            </span>

                            <div>

                                <h3 class="text-2xl font-black text-text-primary">
                                    Entrenamiento específico de porteros
                                </h3>

                                <p class="mt-3 leading-7 text-text-secondary">
                                    Trabajo especializado de colocación, blocaje,
                                    desplazamientos, reflejos, juego aéreo y juego con
                                    los pies.
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- METODOLOGÍA --}}
        {{-- ========================================================= --}}

        <section class="px-6 py-20 lg:py-28">

            <div class="mx-auto grid max-w-7xl items-center gap-16 lg:grid-cols-2">

                <div>

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Cómo trabajamos
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-text-primary sm:text-4xl">
                        Una metodología adaptada a cada jugador
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-text-secondary">
                        Organizamos nuestros entrenamientos mediante tareas progresivas
                        que permiten aprender, practicar y aplicar cada contenido en
                        situaciones reales de juego.
                    </p>

                    <div class="mt-10 space-y-7">

                        <div class="flex gap-5">

                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-club font-black text-white">
                                1
                            </span>

                            <div>

                                <h3 class="font-black text-text-primary">
                                    Observación inicial
                                </h3>

                                <p class="mt-2 leading-7 text-text-secondary">
                                    Analizamos el nivel, las necesidades y los objetivos
                                    del jugador.
                                </p>

                            </div>

                        </div>

                        <div class="flex gap-5">

                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-club font-black text-white">
                                2
                            </span>

                            <div>

                                <h3 class="font-black text-text-primary">
                                    Planificación
                                </h3>

                                <p class="mt-2 leading-7 text-text-secondary">
                                    Diseñamos tareas adecuadas a su edad y etapa de
                                    aprendizaje.
                                </p>

                            </div>

                        </div>

                        <div class="flex gap-5">

                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-club font-black text-white">
                                3
                            </span>

                            <div>

                                <h3 class="font-black text-text-primary">
                                    Seguimiento
                                </h3>

                                <p class="mt-2 leading-7 text-text-secondary">
                                    Evaluamos su evolución y adaptamos los entrenamientos
                                    cuando es necesario.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div>

                    <img
                        src="{{ asset('images/school/escudo.png') }}"
                        alt=""
                        class="h-[520px] w-full rounded-3xl object-cover"
                    >

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- CATEGORÍAS --}}
        {{-- ========================================================= --}}

        <section class="border-y border-gray-200 bg-white px-6 py-20 lg:py-28">

            <div class="mx-auto max-w-7xl">

                <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">

                    <div class="max-w-3xl">

                        <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                            Categorías
                        </p>

                        <h2 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                            Formación para todas las edades
                        </h2>

                    </div>

                    <p class="max-w-xl leading-7 text-text-secondary">
                        Los grupos se organizan según la edad y el nivel para garantizar
                        entrenamientos equilibrados y adaptados.
                    </p>

                </div>

                <div class="mt-14 grid gap-x-10 border-t border-gray-200 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ([
                        'Chupetines',
                        'Prebenjamín',
                        'Benjamín',
                        'Alevín',
                        'Infantil',
                        'Cadete',
                        'Cadete provincial',
                        'Juvenil',
                        'Senior',
                    ] as $category)

                        <div class="flex items-center justify-between border-b border-gray-200 py-6">

                            <span class="text-lg font-black text-text-primary">
                                {{ $category }}
                            </span>

                            <span class="text-club">
                                →
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- EQUIPO TÉCNICO --}}
        {{-- ========================================================= --}}

        <section class="px-6 py-20 lg:py-28">

            <div class="mx-auto max-w-7xl">

                <div class="max-w-3xl">

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Equipo técnico
                    </p>

                    <h2 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                        Profesionales comprometidos con la formación
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-text-secondary">
                        Nuestro equipo trabaja de forma coordinada para ofrecer un
                        acompañamiento cercano, responsable y adaptado a cada grupo.
                    </p>

                </div>

                <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Prebenjamin Fútbol Sala
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>

                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Prebenjamin Fútbol Sala
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>

                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Benjamin Fútbol Sala
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>

                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Benjamin Fútbol Sala
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>

                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Alevín fútbol Sala
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Benjamin Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Alevín Fútbol 
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Infantil Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Cadete Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Cadete Provincial Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Juvenil Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    <article>

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Director deportivo"
                            class="h-96 w-full rounded-3xl object-cover"
                        >

                        <h3 class="mt-6 text-xl font-black text-text-primary">
                            Senior Fútbol
                        </h3>

                        <p class="mt-2 text-text-secondary">
                            Mario Bello García
                        </p>

                    </article>
                    

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- INSTALACIONES --}}
        {{-- ========================================================= --}}

        <section class="bg-white px-6 py-20 lg:py-28">

            <div class="mx-auto max-w-7xl">

                <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">

                    <div>

                        <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                            Instalaciones
                        </p>

                        <h2 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                            Espacios preparados para entrenar y aprender
                        </h2>

                        <p class="mt-6 text-lg leading-8 text-text-secondary">
                            Trabajamos en instalaciones adecuadas para desarrollar
                            sesiones de fútbol, fútbol sala, tecnificación y
                            entrenamientos específicos.
                        </p>

                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Campo de fútbol"
                            class="h-72 w-full rounded-3xl object-cover sm:col-span-2"
                        >
                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Campo de fútbol"
                            class="h-72 w-full rounded-3xl object-cover sm:col-span-2"
                        >
                    </div>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- PRECIOS --}}
        {{-- ========================================================= --}}

        <section
            id="precios"
            class="px-6 py-20 lg:py-28"
        >

            <div class="mx-auto max-w-7xl">

                <div class="mx-auto max-w-3xl text-center">

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Precios
                    </p>

                    <h2 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                        Elige la modalidad que mejor se adapte
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-text-secondary">
                        Dos opciones, un descuento.
                    </p>

                </div>

                <div class="mx-auto mt-14 grid max-w-5xl gap-8 lg:grid-cols-3">

                    {{-- PRECIO 30 € --}}
                    <article class="rounded-3xl border border-gray-200 bg-white p-8 lg:p-10">

                        <p class="font-black uppercase tracking-[0.15em] text-club">
                            Una actividad
                        </p>

                        <div class="mt-6 flex items-end gap-2">

                            <span class="text-6xl font-black text-text-primary">
                                30 €
                            </span>

                            <span class="pb-2 font-semibold text-text-secondary">
                                / mes
                            </span>

                        </div>

                        <p class="mt-6 leading-7 text-text-secondary">
                            Juega a una modalidad dentro de nuestra escuela y disfruta de las siguientes ventajas.
                        </p>

                        <ul class="mt-8 space-y-4">

                            <li class="flex gap-3">

                                <span class="font-black text-club">
                                    ✓
                                </span>

                                <span class="text-text-secondary">
                                    Fútbol o Fútbol Sala
                                </span>

                            </li>

                            <li class="flex gap-3">

                                <span class="font-black text-club">
                                    ✓
                                </span>

                                <span class="text-text-secondary">
                                    Tecnificación
                                </span>

                            </li>

                            <li class="flex gap-3">

                                <span class="font-black text-club">
                                    ✓
                                </span>

                                <span class="text-text-secondary">
                                    Entrenamiento específico de porteros
                                </span>

                            </li>

                        </ul>

                        <a
                            href="{{ route('registrations.create') }}"
                            class="mt-10 inline-flex w-full items-center justify-center rounded-xl border-2 border-club px-6 py-4 font-black text-club transition hover:bg-club hover:text-white"
                        >
                            Inscribirse
                        </a>

                    </article>

                    {{-- PRECIO 45 € --}}
                    <article class="relative overflow-hidden rounded-3xl bg-club p-8 text-white shadow-xl lg:p-10">

                        <span class="absolute right-6 top-6 rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-wide text-club">
                            Más completa
                        </span>

                        <p class="font-black uppercase tracking-[0.15em] text-purple-100 mt-8">
                            Doble actividad
                        </p>

                        <div class="mt-6 flex items-end gap-2">

                            <span class="text-6xl font-black">
                                45 €
                            </span>

                            <span class="pb-2 font-semibold text-purple-100">
                                / mes
                            </span>

                        </div>

                        <p class="mt-6 leading-7 text-purple-100">
                            Juega a dos modalidades dentro de nuestra escuela y disfruta de las siguientes ventajas.
                        </p>

                        <ul class="mt-8 space-y-4">

                            <li class="flex gap-3">

                                <span class="font-black">
                                    ✓
                                </span>

                                <span class="text-purple-50">
                                    Fútbol
                                </span>

                            </li>

                            <li class="flex gap-3">

                                <span class="font-black">
                                    ✓
                                </span>

                                <span class="text-purple-50">
                                    Fútbol Sala
                                </span>

                            </li>

                            <li class="flex gap-3">

                                <span class="font-black">
                                    ✓
                                </span>

                                <span class="text-purple-50">
                                    Tecnificación
                                </span>

                            </li>

                            <li class="flex gap-3">

                                <span class="font-black">
                                    ✓
                                </span>

                                <span class="text-purple-50">
                                    Entrenamiento específico de porteros
                                </span>

                            </li>

                        </ul>

                        <a
                            href="{{ route('registrations.create') }}"
                            class="mt-10 inline-flex w-full items-center justify-center rounded-xl bg-white px-6 py-4 font-black text-club transition hover:-translate-y-1 hover:bg-purple-50"
                        >
                            Elegir doble actividad
                        </a>

                    </article>

                    {{-- DESCUENTO FAMILIAR --}}
<article class="relative overflow-hidden rounded-3xl border-2 border-club bg-white p-8 lg:p-10">

    <span class="absolute right-6 top-6 rounded-full bg-purple-100 px-4 py-2 text-xs font-black uppercase tracking-wide text-club">
        Ventaja familiar
    </span>

    <p class="font-black uppercase tracking-[0.15em] text-club mt-8">
        Descuento familiar
    </p>

    <div class="mt-6 flex items-end gap-2">

        <span class="text-6xl font-black text-text-primary">
            5 €
        </span>

        <span class="pb-2 font-semibold text-text-secondary">
            de descuento
        </span>

    </div>

    <p class="mt-6 leading-7 text-text-secondary">
        Las familias con más de un miembro inscrito podrán beneficiarse
        de un descuento mensual a partir del segundo integrante.
    </p>

    <ul class="mt-8 space-y-4">

        <li class="flex gap-3">

            <span class="font-black text-club">
                ✓
            </span>

            <span class="text-text-secondary">
                Descuento de 5 € al mes desde el segundo miembro inscrito
            </span>

        </li>

        <li class="flex gap-3">

            <span class="font-black text-club">
                ✓
            </span>

            <span class="text-text-secondary">
                Aplicable a miembros de la misma unidad familiar
            </span>

        </li>

        <li class="flex gap-3">

            <span class="font-black text-club">
                ✓
            </span>

            <span class="text-text-secondary">
                Compatible con la modalidad de una o doble actividad
            </span>

        </li>

        <li class="flex gap-3">

            <span class="font-black text-club">
                ✓
            </span>

            <span class="text-text-secondary">
                El descuento se mantiene mientras ambos miembros permanezcan inscritos
            </span>

        </li>

    </ul>


</article>
                </div>

                <p class="mx-auto mt-8 max-w-3xl text-center text-sm leading-6 text-text-secondary">
                    Los horarios, grupos y disponibilidad de plazas pueden variar según
                    la categoría y la actividad seleccionada.
                </p>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- PREGUNTAS FRECUENTES --}}
        {{-- ========================================================= --}}

        <section class="border-y border-gray-200 bg-white px-6 py-20 lg:py-28">

            <div class="mx-auto grid max-w-7xl gap-14 lg:grid-cols-[0.7fr_1.3fr]">

                <div>

                    <p class="text-sm font-black uppercase tracking-[0.2em] text-club">
                        Preguntas frecuentes
                    </p>

                    <h2 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                        Todo lo que necesitas saber
                    </h2>

                    <p class="mt-6 leading-8 text-text-secondary">
                        Información básica antes de comenzar el proceso de inscripción.
                    </p>

                </div>

                <div class="divide-y divide-gray-200 border-y border-gray-200">

                    <details class="group py-6">

                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-text-primary">

                            ¿Qué edades pueden participar?

                            <span class="text-2xl text-club transition group-open:rotate-45">
                                +
                            </span>

                        </summary>

                        <p class="mt-4 max-w-3xl leading-7 text-text-secondary">
                            La escuela cuenta con categorías desde Chupetines hasta
                            Juvenil. La asignación se realiza según la edad y el nivel
                            del jugador.
                        </p>

                    </details>

                    <details class="group py-6">

                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-text-primary">

                            ¿Qué significa doble actividad?

                            <span class="text-2xl text-club transition group-open:rotate-45">
                                +
                            </span>

                        </summary>

                        <p class="mt-4 max-w-3xl leading-7 text-text-secondary">
                            Permite combinar el fútbol y fútbol sala simultáneamente ademas de los servicios de 
                            tecnificación y entrenamiento específico
                            de porteros.
                        </p>

                    </details>

                    <details class="group py-6">

                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-text-primary">

                            ¿Los entrenamientos se adaptan al nivel del jugador?

                            <span class="text-2xl text-club transition group-open:rotate-45">
                                +
                            </span>

                        </summary>

                        <p class="mt-4 max-w-3xl leading-7 text-text-secondary">
                            Sí. Los contenidos y tareas se adaptan a la edad, experiencia,
                            nivel y necesidades de cada grupo y jugador.
                        </p>

                    </details>

                    <details class="group py-6">

                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-text-primary">

                            ¿Cómo se realiza la inscripción?

                            <span class="text-2xl text-club transition group-open:rotate-45">
                                +
                            </span>

                        </summary>

                        <p class="mt-4 max-w-3xl leading-7 text-text-secondary">
                            El padre, madre o tutor debe completar el formulario de
                            inscripción con los datos del menor y los datos de contacto.
                        </p>

                    </details>

                    <details class="group py-6">

                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-text-primary">

                            ¿Hay entrenamientos específicos para porteros?

                            <span class="text-2xl text-club transition group-open:rotate-45">
                                +
                            </span>

                        </summary>

                        <p class="mt-4 max-w-3xl leading-7 text-text-secondary">
                            Sí. Disponemos de sesiones específicas centradas en las
                            necesidades técnicas, tácticas y coordinativas del portero.
                        </p>

                    </details>

                </div>

            </div>

        </section>

        {{-- ========================================================= --}}
        {{-- LLAMADA FINAL --}}
        {{-- ========================================================= --}}

        <section class="px-6 py-20 lg:py-28">

            <div class="mx-auto max-w-7xl overflow-hidden rounded-3xl bg-club">

                <div class="grid items-center gap-10 lg:grid-cols-2">

                    <div class="px-8 py-14 text-white sm:px-12 lg:px-16">

                        <p class="text-sm font-black uppercase tracking-[0.2em] text-purple-100">
                            Forma parte de la escuela
                        </p>

                        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">
                            Comienza hoy su evolución deportiva
                        </h2>

                        <p class="mt-6 max-w-xl text-lg leading-8 text-purple-100">
                            Completa el formulario de inscripción y nos pondremos en
                            contacto contigo para confirmar la categoría, actividad y
                            disponibilidad.
                        </p>

                        <a
                            href="{{ route('registrations.create') }}"
                            class="mt-9 inline-flex items-center justify-center rounded-xl bg-white px-8 py-4 font-black text-club transition duration-300 hover:-translate-y-1 hover:bg-purple-50"
                        >
                            Realizar inscripción
                        </a>

                    </div>

                    <div class="h-full min-h-[360px]">

                        <img
                            src="{{ asset('images/school/escudo.png') }}"
                            alt="Jugadores de la Escuela CDEF Patrocinio"
                            class="h-full w-full object-cover"
                        >

                    </div>

                </div>

            </div>

        </section>

    </main>

</body>

</html>