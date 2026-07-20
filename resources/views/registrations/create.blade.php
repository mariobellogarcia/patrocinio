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
        content="Formulario de inscripción de jugadores de la Escuela CDEF Patrocinio."
    >

    <title>
        Formulario de inscripción | CDEF Patrocinio
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background text-text-primary">
    

    <main class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:py-16">

        {{-- Volver a la página de inicio --}}
        <a
            href="{{ route('home') }}"
            class="inline-flex items-center gap-2 text-sm font-semibold text-text-club hover:underline"
        >
            <span aria-hidden="true">←</span>

            Volver al inicio
        </a>

        {{-- Cabecera --}}
        <header class="mt-8 rounded-2xl bg-white p-6 shadow-lg sm:p-8">

            <p class="text-sm font-bold uppercase tracking-[0.2em] text-text-club">
                Escuela CDEF Patrocinio
            </p>

            <h1 class="mt-4 text-3xl font-black text-text-primary sm:text-4xl">
                Formulario de inscripción
            </h1>

            <p class="mt-4 max-w-3xl leading-7 text-gray-600">
    Este formulario debe ser cumplimentado por el padre, la madre
    o el tutor legal del menor.
</p>

<p class="mt-2 max-w-3xl leading-7 text-gray-600">
    Los campos marcados con
    <span class="font-bold text-red-600">*</span>
    son obligatorios.
</p>

        </header>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div
                class="mt-8 rounded-xl border border-green-300 bg-green-50 p-5 text-green-800"
                role="status"
            >
                <p class="font-semibold">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        {{-- Resumen de errores --}}
        @if ($errors->any())
            <div
                class="mt-8 rounded-xl border border-red-300 bg-red-50 p-5 text-red-800"
                role="alert"
            >
                <p class="font-bold">
                    No se puede continuar. Revisa los siguientes campos:
                </p>

                <ul class="mt-3 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            id="registration-form"
            action="{{ route('registrations.store') }}"
            method="POST"
            class="mt-8 space-y-8"
        >
            @csrf

            {{-- ============================================================
                PASO 1: DATOS DEL JUGADOR
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 1
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Datos del jugador
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Introduce los datos personales del menor.
                    </p>

                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    {{-- Nombre --}}
                    <div>
                        <label
                            for="player_first_name"
                            class="block font-semibold"
                        >
                            Nombre
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="player_first_name"
                            name="player[first_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('player.first_name') }}"
                            required
                            autocomplete="given-name"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.first_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('player.first_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Primer apellido --}}
                    <div>
                        <label
                            for="player_last_name"
                            class="block font-semibold"
                        >
                            Primer apellido
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="player_last_name"
                            name="player[last_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('player.last_name') }}"
                            required
                            autocomplete="family-name"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.last_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('player.last_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Segundo apellido --}}
                    <div>
                        <label
                            for="player_second_last_name"
                            class="block font-semibold"
                        >
                            Segundo apellido
                        </label>

                        <input
                            id="player_second_last_name"
                            name="player[second_last_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('player.second_last_name') }}"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.second_last_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('player.second_last_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Fecha de nacimiento --}}
                    <div>
                        <label
                            for="player_birth_date"
                            class="block font-semibold"
                        >
                            Fecha de nacimiento
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="player_birth_date"
                            name="player[birth_date]"
                            type="text"
                            inputmode="numeric"
                            maxlength="10"
                            pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                            placeholder="Ejemplo: 15/09/2015"
                            title="Introduce la fecha con el formato dd/mm/aaaa"
                            value="{{ old('player.birth_date') }}"
                            required
                            autocomplete="bday"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.birth_date')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Formato obligatorio:
                            <strong>dd/mm/aaaa</strong>.
                        </p>
                        <p class="mt-2 text-sm text-gray-500">
                            La fecha debe ser anterior al día de hoy.
                        </p>

                        @error('player.birth_date')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Sexo --}}
                    <div>
                        <label
                            for="player_gender"
                            class="block font-semibold"
                        >
                            Sexo
                            <span class="text-red-600">*</span>
                        </label>

                        <select
                            id="player_gender"
                            name="player[gender]"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.gender')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >
                            <option value="">
                                Selecciona una opción
                            </option>

                            <option
                                value="male"
                                @selected(old('player.gender') === 'male')
                            >
                                Masculino
                            </option>

                            <option
                                value="female"
                                @selected(old('player.gender') === 'female')
                            >
                                Femenino
                            </option>

                            <option
                                value="other"
                                @selected(old('player.gender') === 'other')
                            >
                                Otro
                            </option>

                            <option
                                value="not_specified"
                                @selected(old('player.gender') === 'not_specified')
                            >
                                Prefiero no indicarlo
                            </option>
                        </select>

                        @error('player.gender')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- DNI del menor --}}
                    <div>
                        <label
                            for="player_dni"
                            class="block font-semibold"
                        >
                            DNI del menor
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="player_dni"
                            name="player[dni]"
                            type="text"
                            maxlength="9"
                            pattern="0|[0-9]{8}[A-Za-z]"
                            placeholder="Ejemplo: 12345678Z"
                            title="Introduce 8 números y una letra, o 0 si el menor no dispone de DNI"
                            value="{{ old('player.dni', '0') }}"
                            required
                            autocomplete="off"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 uppercase outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.dni')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Formato: 8 números y una letra.
                        </p>
                        <p class="mt-2 text-sm text-gray-500">
                            Introduce <strong>0</strong> si el menor no dispone
                            de DNI.
                        </p>

                        @error('player.dni')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Teléfono de contacto --}}
                    <div class="md:col-span-2">
                        <label
                            for="player_contact_phone"
                            class="block font-semibold"
                        >
                            Teléfono de contacto
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="player_contact_phone"
                            name="player[contact_phone]"
                            type="tel"
                            inputmode="numeric"
                            minlength="9"
                            maxlength="9"
                            pattern="[0-9]{9}"
                            placeholder="Ejemplo: 612345678"
                            title="Introduce exactamente 9 números seguidos"
                            value="{{ old('player.contact_phone') }}"
                            required
                            autocomplete="tel"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.contact_phone')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Introduce exactamente 9 números seguidos, sin
                            espacios, guiones ni prefijo internacional.
                        </p>

                        @error('player.contact_phone')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </section>

            {{-- ============================================================
                PASO 2: RESPONSABLE LEGAL
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 2
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Padre, madre o tutor legal
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Introduce los datos del adulto responsable del menor.
                    </p>

                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    {{-- Relación con el menor --}}
                    <div>
                        <label
                            for="guardian_relationship"
                            class="block font-semibold"
                        >
                            Relación con el menor
                            <span class="text-red-600">*</span>
                        </label>

                        <select
                            id="guardian_relationship"
                            name="guardian[relationship]"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.relationship')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >
                            <option value="">
                                Selecciona una opción
                            </option>

                            <option
                                value="father"
                                @selected(old('guardian.relationship') === 'father')
                            >
                                Padre
                            </option>

                            <option
                                value="mother"
                                @selected(old('guardian.relationship') === 'mother')
                            >
                                Madre
                            </option>

                            <option
                                value="legal_guardian"
                                @selected(old('guardian.relationship') === 'legal_guardian')
                            >
                                Tutor legal
                            </option>
                        </select>

                        @error('guardian.relationship')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nombre --}}
                    <div>
                        <label
                            for="guardian_first_name"
                            class="block font-semibold"
                        >
                            Nombre
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_first_name"
                            name="guardian[first_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('guardian.first_name') }}"
                            required
                            autocomplete="given-name"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.first_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('guardian.first_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Primer apellido --}}
                    <div>
                        <label
                            for="guardian_last_name"
                            class="block font-semibold"
                        >
                            Primer apellido
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_last_name"
                            name="guardian[last_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('guardian.last_name') }}"
                            required
                            autocomplete="family-name"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.last_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('guardian.last_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Segundo apellido --}}
                    <div>
                        <label
                            for="guardian_second_last_name"
                            class="block font-semibold"
                        >
                            Segundo apellido
                        </label>

                        <input
                            id="guardian_second_last_name"
                            name="guardian[second_last_name]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('guardian.second_last_name') }}"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.second_last_name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('guardian.second_last_name')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- DNI del responsable --}}
                    <div>
                        <label
                            for="guardian_dni"
                            class="block font-semibold"
                        >
                            DNI del responsable
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_dni"
                            name="guardian[dni]"
                            type="text"
                            maxlength="9"
                            pattern="[0-9]{8}[A-Za-z]"
                            placeholder="Ejemplo: 12345678Z"
                            title="Introduce 8 números y una letra"
                            value="{{ old('guardian.dni') }}"
                            required
                            autocomplete="off"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 uppercase outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.dni')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Formato: 8 números y una letra.
                        </p>

                        @error('guardian.dni')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Teléfono principal --}}
                    <div>
                        <label
                            for="guardian_phone"
                            class="block font-semibold"
                        >
                            Teléfono principal
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_phone"
                            name="guardian[phone]"
                            type="tel"
                            inputmode="numeric"
                            minlength="9"
                            maxlength="9"
                            pattern="[0-9]{9}"
                            placeholder="Ejemplo: 612345678"
                            title="Introduce exactamente 9 números seguidos"
                            value="{{ old('guardian.phone') }}"
                            required
                            autocomplete="tel"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.phone')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Introduce exactamente 9 números seguidos.
                        </p>

                        @error('guardian.phone')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Segundo teléfono --}}
                    <div>
                        <label
                            for="guardian_secondary_phone"
                            class="block font-semibold"
                        >
                            Segundo teléfono
                        </label>

                        <input
                            id="guardian_secondary_phone"
                            name="guardian[secondary_phone]"
                            type="tel"
                            inputmode="numeric"
                            minlength="9"
                            maxlength="9"
                            pattern="[0-9]{9}"
                            placeholder="Ejemplo: 687654321"
                            title="Introduce exactamente 9 números seguidos"
                            value="{{ old('guardian.secondary_phone') }}"
                            autocomplete="tel"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.secondary_phone')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Campo opcional. Si se introduce, debe contener
                            exactamente 9 números.
                        </p>

                        @error('guardian.secondary_phone')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Correo del responsable --}}
                    <div>
                        <label
                            for="guardian_email"
                            class="block font-semibold"
                        >
                            Correo electrónico
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_email"
                            name="guardian[email]"
                            type="email"
                            maxlength="255"
                            placeholder="Ejemplo: nombre@dominio.com"
                            value="{{ old('guardian.email') }}"
                            required
                            autocomplete="email"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.email')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Introduce una dirección de correo válida.
                        </p>

                        @error('guardian.email')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Dirección --}}
                    <div class="md:col-span-2">
                        <label
                            for="guardian_address"
                            class="block font-semibold"
                        >
                            Dirección
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_address"
                            name="guardian[address]"
                            type="text"
                            maxlength="255"
                            placeholder="Ejemplo: Avenida Juan Carlos I, 15"
                            value="{{ old('guardian.address') }}"
                            required
                            autocomplete="street-address"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.address')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('guardian.address')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Localidad --}}
                    <div>
                        <label
                            for="guardian_city"
                            class="block font-semibold"
                        >
                            Localidad
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_city"
                            name="guardian[city]"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            placeholder="Ejemplo: Talavera de la Reina"
                            value="{{ old('guardian.city') }}"
                            required
                            autocomplete="address-level2"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.city')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('guardian.city')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Código postal --}}
                    <div>
                        <label
                            for="guardian_postal_code"
                            class="block font-semibold"
                        >
                            Código postal
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="guardian_postal_code"
                            name="guardian[postal_code]"
                            type="text"
                            inputmode="numeric"
                            minlength="5"
                            maxlength="5"
                            pattern="[0-9]{5}"
                            placeholder="Ejemplo: 45600"
                            title="Introduce exactamente 5 números"
                            value="{{ old('guardian.postal_code') }}"
                            required
                            autocomplete="postal-code"
                            spellcheck="false"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('guardian.postal_code')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Introduce exactamente 5 números.
                        </p>

                        @error('guardian.postal_code')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </section>

            {{-- ============================================================
                PASO 3: DATOS DE LA ESCUELA
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 3
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Datos de la escuela
                    </h2>

                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    {{-- Categoría --}}
                    <div class="md:col-span-2">
                        <label
                            for="player_category_id"
                            class="block font-semibold"
                        >
                            Categoría y responsable
                            <span class="text-red-600">*</span>
                        </label>

                        <select
                            id="player_category_id"
                            name="player[category_id]"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('player.category_id')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >
                            <option value="">
                                Selecciona una categoría
                            </option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(
                                        old('player.category_id') == $category->id
                                    )
                                >
                                    {{ $category->name }}
                                    — Responsable: {{ $category->responsible }}
                                </option>
                            @endforeach
                        </select>

                        @error('player.category_id')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Talla de equipación --}}
                    <div>
                        <label
                            for="equipment_size"
                            class="block font-semibold"
                        >
                            Talla de equipación
                        </label>

                        <select
                            id="equipment_size"
                            disabled
                            aria-disabled="true"
                            class="mt-2 w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-gray-500"
                        >
                            <option>
                                Función todavía no disponible
                            </option>
                        </select>
                    </div>

                    {{-- Talla de chándal --}}
                    <div>
                        <label
                            for="tracksuit_size"
                            class="block font-semibold"
                        >
                            Talla de chándal
                        </label>

                        <select
                            id="tracksuit_size"
                            disabled
                            aria-disabled="true"
                            class="mt-2 w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-gray-500"
                        >
                            <option>
                                Función todavía no disponible
                            </option>
                        </select>
                    </div>

                </div>
            </section>

            {{-- ============================================================
                PASO 4: CONDICIONES Y AUTORIZACIONES
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 4
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Condiciones y autorizaciones
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Las dos primeras condiciones son obligatorias.
                        La autorización de imagen es opcional.
                    </p>

                </div>

                <div class="mt-6 space-y-6">

                    {{-- Reglamento obligatorio --}}
                    <div>
                        <label class="flex cursor-pointer items-start gap-3">

                            <input
                                id="school_rules_accepted"
                                name="guardian[school_rules_accepted]"
                                type="checkbox"
                                value="1"
                                required
                                @checked(old('guardian.school_rules_accepted'))
                                class="mt-1 size-5 shrink-0 accent-purple-700"
                            >

                            <span class="leading-7">
                                <strong>Obligatorio.</strong>

                                Declaro que he leído y acepto el régimen interno
                                disciplinario y las normas de organización y
                                funcionamiento de la Escuela CDEF Patrocinio.
                            </span>

                        </label>

                        @error('guardian.school_rules_accepted')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Protección de datos obligatoria --}}
                    <div>
                        <label class="flex cursor-pointer items-start gap-3">

                            <input
                                id="privacy_accepted"
                                name="guardian[privacy_accepted]"
                                type="checkbox"
                                value="1"
                                required
                                @checked(old('guardian.privacy_accepted'))
                                class="mt-1 size-5 shrink-0 accent-purple-700"
                            >

                            <span class="leading-7">
                                <strong>Obligatorio.</strong>

                                He leído la información sobre protección de
                                datos y acepto que los datos aportados se
                                utilicen exclusivamente para gestionar la
                                inscripción, la actividad deportiva, las
                                comunicaciones y el funcionamiento
                                administrativo de la escuela.
                            </span>

                        </label>

                        @error('guardian.privacy_accepted')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Autorización de imagen opcional --}}
                    <div>
                        <label class="flex cursor-pointer items-start gap-3">

                            <input
                                id="image_consent"
                                name="guardian[image_consent]"
                                type="checkbox"
                                value="1"
                                @checked(old('guardian.image_consent'))
                                class="mt-1 size-5 shrink-0 accent-purple-700"
                            >

                            <span class="leading-7">
                                <strong>Opcional.</strong>

                                Autorizo la captación y utilización de imágenes
                                del menor tomadas durante actividades deportivas
                                para su publicación en los canales oficiales
                                del club.
                            </span>

                        </label>
                    </div>

                </div>

                <div class="mt-8 rounded-xl border border-gray-200 bg-gray-50 p-5">

                    <h3 class="font-bold text-text-primary">
                        Información básica sobre protección de datos
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-gray-700">
                        Los datos se utilizarán para gestionar la inscripción,
                        la organización deportiva, las comunicaciones con las
                        familias y el funcionamiento administrativo de la
                        escuela. Los datos no serán vendidos a terceros.
                    </p>

                    <p class="mt-3 text-sm leading-6 text-gray-700">
                        Podrán comunicarse únicamente cuando exista una
                        obligación legal o cuando sea necesario utilizar
                        proveedores autorizados para prestar servicios
                        técnicos, administrativos o de comunicación.
                    </p>

                </div>

            </section>

            {{-- Primer clic: revisar --}}
            <button
                id="review-registration-button"
                type="button"
                class="w-full rounded-xl border-2 border-text-club bg-white px-6 py-4 text-lg font-bold text-text-club shadow-md transition duration-300 "
            >
                Revisar inscripción
            </button>

        </form>

    </main>

    {{-- ================================================================
        MODAL DE CONFIRMACIÓN
    ================================================================= --}}
    <div
        id="registration-review-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4"
        role="dialog"
        aria-modal="true"
        aria-labelledby="registration-review-title"
    >
        <section
            class="max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-2xl bg-white p-6 shadow-2xl sm:p-8"
        >

            <h2
                id="registration-review-title"
                class="text-2xl font-black text-text-primary"
            >
                Revisa los datos introducidos
            </h2>

            <p class="mt-3 leading-7 text-gray-600">
                Comprueba que toda la información sea correcta. La inscripción
                no se guardará hasta que pulses
                «Confirmar y registrar».
            </p>

            <div
                id="registration-review-summary"
                class="mt-6 space-y-4 rounded-xl bg-gray-50 p-5"
            ></div>

            <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <button
                    id="continue-editing-button"
                    type="button"
                    class="rounded-xl border-2 border-text-club bg-white px-6 py-3 font-bold text-text-club shadow-sm transition duration-300 hover:bg-text-club"
                >
                    ← Corregir datos
                </button>

                <button
                    id="confirm-registration-button"
                    type="button"
                    class="rounded-xl border-2 border-text-club bg-white px-6 py-3 font-bold text-text-club shadow-sm transition duration-300 hover:bg-text-club"
                >
                    Confirmar y registrar
                </button>

            </div>

        </section>
    </div>

</body>

</html>