@extends('layouts.admin')

@section('title', 'Jugadores')

@section('content')
    <main class="mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">


        {{-- Mensaje informativo --}}
        @if (session('info'))
            <div
                class="mb-8 rounded-xl border border-blue-300 bg-blue-50 p-5 text-blue-800"
                role="status"
            >
                <p class="font-semibold">
                    {{ session('info') }}
                </p>
            </div>
        @endif

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div
                class="mb-8 rounded-xl border border-red-300 bg-red-50 p-5 text-red-800"
                role="alert"
            >
                <p class="font-bold">
                    No se pueden aplicar los filtros:
                </p>

                <ul class="mt-3 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Dos tarjetas separadas --}}
        <div class="space-y-12">

            {{-- ============================================================
                TARJETA 1: CABECERA Y BUSCADOR
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-6">

                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-text-club">
                        Administración
                    </p>

                    <div class="mt-4 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

                        <div>
                            <h1 class="text-3xl font-black text-text-primary sm:text-4xl">
                                Jugadores
                            </h1>

                            <p class="mt-3 max-w-3xl leading-7 text-gray-600">
                                Busca, consulta y gestiona los jugadores
                                registrados en la Escuela CDEF Patrocinio.
                            </p>
                        </div>

                        <div class="rounded-xl bg-purple-50 px-5 py-3 text-text-club">
                            <p class="text-sm font-bold">
                                {{ $players->total() }}

                                {{ $players->total() === 1
                                    ? 'jugador encontrado'
                                    : 'jugadores encontrados' }}
                            </p>
                        </div>

                    </div>

                </div>

                <div class="mt-7">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Buscador
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Buscar jugadores
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Puedes combinar uno o varios filtros.
                    </p>

                </div>

                <form
                    method="GET"
                    action="{{ route('admin.players.index') }}"
                    class="mt-7"
                >
                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

                        {{-- Nombre --}}
                        <div>
                            <label
                                for="search"
                                class="block font-semibold"
                            >
                                Nombre o apellidos
                            </label>

                            <input
                                id="search"
                                name="search"
                                type="text"
                                maxlength="100"
                                value="{{ request('search') }}"
                                placeholder="Ejemplo: Mario Bello"
                                autocomplete="off"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100"
                            >
                        </div>

                        {{-- DNI --}}
                        <div>
                            <label
                                for="dni"
                                class="block font-semibold"
                            >
                                DNI
                            </label>

                            <input
                                id="dni"
                                name="dni"
                                type="text"
                                maxlength="20"
                                value="{{ request('dni') }}"
                                placeholder="Ejemplo: 12345678Z"
                                autocomplete="off"
                                spellcheck="false"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 uppercase outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100"
                            >
                        </div>

                        {{-- Categoría --}}
                        <div>
                            <label
                                for="category_id"
                                class="block font-semibold"
                            >
                                Categoría
                            </label>

                            <select
                                id="category_id"
                                name="category_id"
                                class="mt-2 w-full rounded-xl border border-gray-300 bg-white px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100"
                            >
                                <option value="">
                                    Todas las categorías
                                </option>

                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        @selected(
                                            (string) request('category_id')
                                            === (string) $category->id
                                        )
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Estado --}}
                        <div>
                            <label
                                for="status"
                                class="block font-semibold"
                            >
                                Estado
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="mt-2 w-full rounded-xl border border-gray-300 bg-white px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100"
                            >
                                <option value="">
                                    Todos los estados
                                </option>

                                <option
                                    value="pending"
                                    @selected(request('status') === 'pending')
                                >
                                    Pendiente
                                </option>

                                <option
                                    value="accepted"
                                    @selected(request('status') === 'accepted')
                                >
                                    Activo
                                </option>

                                <option
                                    value="waiting_list"
                                    @selected(request('status') === 'waiting_list')
                                >
                                    Lista de espera
                                </option>

                                <option
                                    value="rejected"
                                    @selected(request('status') === 'rejected')
                                >
                                    Inactivo
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-8 flex flex-col-reverse gap-4 border-t border-gray-200 pt-6 sm:flex-row sm:items-center sm:justify-between">

                        <p class="text-sm text-gray-500">
                            Pulsa «Buscar» para aplicar los filtros.
                        </p>

                        <div class="flex flex-col-reverse gap-3 sm:flex-row">

                            <a
                                href="{{ route('admin.players.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border-2 border-[#8B328C] bg-white px-6 py-3 font-bold text-[#8B328C] shadow-sm transition hover:bg-purple-50"
                            >
                                Limpiar filtros
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-xl border-2 border-[#8B328C] bg-white px-6 py-3 font-bold text-[#8B328C] shadow-sm transition hover:bg-purple-50"
                            >
                                Buscar
                            </button>

                        </div>

                    </div>
                </form>

            </section>

            {{-- ============================================================
                TARJETA 2: LISTADO
            ============================================================= --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Resultados
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Listado de jugadores
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Consulta la ficha o cambia el estado de cada jugador.
                    </p>

                </div>

                <div class="mt-6 overflow-hidden rounded-xl border border-gray-200">

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                        Jugador
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                        DNI
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                        Categoría
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                        Estado
                                    </th>

                                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-gray-600">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($players as $player)

                                    @php
                                        $statusClass = match ($player->status) {
                                            'accepted' => 'text-green-700',
                                            'waiting_list' => 'text-blue-700',
                                            'rejected' => 'text-gray-500',
                                            default => 'text-amber-700',
                                        };

                                        $statusLabel = match ($player->status) {
                                            'accepted' => 'Activo',
                                            'waiting_list' => 'Lista de espera',
                                            'rejected' => 'Inactivo',
                                            default => 'Pendiente',
                                        };
                                    @endphp

                                    <tr class="transition hover:bg-purple-50/50">

                                        <td class="px-6 py-5">
                                            <p class="font-bold text-text-primary">
                                                {{ $player->first_name }}
                                                {{ $player->last_name }}
                                                {{ $player->second_last_name }}
                                            </p>
                                        </td>

                                        <td class="px-6 py-5 text-sm text-gray-600">
                                            {{ $player->dni ?: 'Sin DNI' }}
                                        </td>

                                        <td class="px-6 py-5 text-sm text-gray-600">
                                            {{ $player->category?->name ?? 'Sin categoría' }}
                                        </td>

                                        <td class="px-6 py-5">
                                            <span class="text-sm font-bold {{ $statusClass }}">
                                                {{ $statusLabel }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-5">
                                            <div class="flex flex-wrap justify-end gap-3">

                                                {{-- Ver ficha --}}
                                                <a
                                                    href="{{ route('admin.players.show', $player) }}"
                                                    class="inline-flex items-center justify-center rounded-xl border-2 border-[#8B328C] bg-white px-4 py-2 text-sm font-bold text-[#8B328C] transition hover:bg-purple-50"
                                                >
                                                    Ver ficha
                                                </a>

                                                {{-- Activar --}}
                                                @if ($player->status !== 'accepted')
                                                    <form
                                                        method="POST"
                                                        action="{{ route('admin.players.activate', $player) }}"
                                                        onsubmit="return confirm('¿Estás seguro de que deseas activar a {{ $player->first_name }} {{ $player->last_name }}?');"
                                                    >
                                                        @csrf
                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="inline-flex items-center justify-center rounded-xl border-2 border-[#8B328C] bg-white px-4 py-2 text-sm font-bold text-[#8B328C] transition hover:bg-purple-50"
                                                        >
                                                            Activar
                                                        </button>
                                                    </form>
                                                @endif

                                                {{-- Desactivar --}}
                                                @if ($player->status === 'accepted')
                                                    <form
                                                        method="POST"
                                                        action="{{ route('admin.players.deactivate', $player) }}"
                                                        onsubmit="return confirm('¿Estás seguro de que deseas desactivar a {{ $player->first_name }} {{ $player->last_name }}?');"
                                                    >
                                                        @csrf
                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="inline-flex items-center justify-center rounded-xl border-2 border-[#8B328C] bg-white px-4 py-2 text-sm font-bold text-[#8B328C] transition hover:bg-purple-50"
                                                        >
                                                            Desactivar
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td
                                            colspan="5"
                                            class="px-6 py-14 text-center"
                                        >
                                            <p class="font-bold text-text-primary">
                                                No se encontraron jugadores
                                            </p>

                                            <p class="mt-2 text-sm text-gray-500">
                                                Modifica los filtros o pulsa
                                                «Limpiar filtros».
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>

                @if ($players->hasPages())
                    <div class="mt-6">
                        {{ $players->links() }}
                    </div>
                @endif

            </section>

        </div>

    </main>
@endsection