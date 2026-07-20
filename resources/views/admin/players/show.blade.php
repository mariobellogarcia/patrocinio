@extends('layouts.admin')

@section('title', 'Ficha del jugador')

@section('content')

    <section class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Cabecera de la ficha --}}
        <header class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-club">
                    Ficha del jugador
                </p>

                <h1 class="mt-2 text-3xl font-black text-text-primary">
                    {{ $player->first_name }}
                    {{ $player->last_name }}
                    {{ $player->second_last_name }}
                </h1>

                <p class="mt-2 text-sm text-text-secondary">
                    Información personal, deportiva y familiar.
                </p>
            </div>

            <div>
                @if ($player->status === 'active')

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-800">
                        Activo
                    </span>

                @elseif ($player->status === 'pending')

                    <span class="inline-flex rounded-full bg-amber-100 px-4 py-2 text-sm font-bold text-amber-800">
                        Pendiente
                    </span>

                @else

                    <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-sm font-bold text-gray-700">
                        {{ ucfirst($player->status) }}
                    </span>

                @endif
            </div>

        </header>

        {{-- Datos del jugador --}}
        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-black/5">

            <header class="border-b border-gray-200 px-6 py-5">
                <h2 class="text-xl font-black text-text-primary">
                    Datos del jugador
                </h2>
            </header>

            <dl class="grid gap-6 p-6 md:grid-cols-2 lg:grid-cols-3">

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Nombre
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->first_name }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Primer apellido
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->last_name }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Segundo apellido
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->second_last_name ?: 'No indicado' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        DNI
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->dni ?: 'Sin DNI' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Fecha de nacimiento
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->birth_date?->format('d/m/Y') ?? 'No indicada' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Género
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        @switch($player->gender)
                            @case('male')
                                Masculino
                                @break

                            @case('female')
                                Femenino
                                @break

                            @default
                                {{ $player->gender ?: 'No indicado' }}
                        @endswitch
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Categoría
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->category?->name ?? 'Sin categoría' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Teléfono de contacto
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->contact_phone ?: 'No indicado' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Talla de equipación
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->equipment_size ?: 'No indicada' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Talla de chándal
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->tracksuit_size ?: 'No indicada' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Fecha de inscripción
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        {{ $player->registered_at?->format('d/m/Y H:i') ?? 'No indicada' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-semibold text-text-secondary">
                        Estado
                    </dt>

                    <dd class="mt-1 font-bold text-text-primary">
                        @switch($player->status)
                            @case('active')
                                Activo
                                @break

                            @case('pending')
                                Pendiente
                                @break

                            @case('inactive')
                                Inactivo
                                @break

                            @default
                                {{ ucfirst($player->status) }}
                        @endswitch
                    </dd>
                </div>

            </dl>

        </section>

        {{-- Datos de los tutores --}}
        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-black/5">

            <header class="border-b border-gray-200 px-6 py-5">

                <h2 class="text-xl font-black text-text-primary">
                    Padre, madre o tutor
                </h2>

                <p class="mt-1 text-sm text-text-secondary">
                    Personas responsables asociadas al jugador.
                </p>

            </header>

            <div class="space-y-6 p-6">

                @forelse ($player->guardians as $guardian)

                    <article class="rounded-xl border border-gray-200 p-5">

                        <h3 class="text-lg font-black text-club">
                            @switch($guardian->relationship)
                                @case('father')
                                    Padre
                                    @break

                                @case('mother')
                                    Madre
                                    @break

                                @case('guardian')
                                    Tutor legal
                                    @break

                                @default
                                    {{ ucfirst($guardian->relationship) }}
                            @endswitch
                        </h3>

                        <dl class="mt-5 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Nombre completo
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->first_name }}
                                    {{ $guardian->last_name }}
                                    {{ $guardian->second_last_name }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    DNI
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->dni ?: 'No indicado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Teléfono
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->phone ?: 'No indicado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Teléfono secundario
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->secondary_phone ?: 'No indicado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Correo electrónico
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->email ?: 'No indicado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Dirección
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->address ?: 'No indicada' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Ciudad
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->city ?: 'No indicada' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Código postal
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->postal_code ?: 'No indicado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Reglamento interno
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->school_rules_accepted ? 'Aceptado' : 'No aceptado' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Protección de datos
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->privacy_accepted ? 'Aceptada' : 'No aceptada' }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-semibold text-text-secondary">
                                    Derechos de imagen
                                </dt>

                                <dd class="mt-1 font-bold text-text-primary">
                                    {{ $guardian->image_consent ? 'Autorizados' : 'No autorizados' }}
                                </dd>
                            </div>

                        </dl>

                    </article>

                @empty

                    <p class="text-sm text-text-secondary">
                        Este jugador no tiene tutores registrados.
                    </p>

                @endforelse

            </div>

        </section>

        {{-- Acciones --}}
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">

            <a
                href="{{ route('admin.players.index') }}"
                class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-bold text-gray-700 transition hover:bg-gray-50"
            >
                ← Volver al listado
            </a>

            <button
                type="button"
                disabled
                class="cursor-not-allowed rounded-xl bg-gray-200 px-5 py-3 text-sm font-bold text-gray-500"
            >
                Modificar
            </button>

            <button
                type="button"
                disabled
                class="cursor-not-allowed rounded-xl bg-gray-200 px-5 py-3 text-sm font-bold text-gray-500"
            >
                Eliminar
            </button>

        </div>

    </section>

@endsection