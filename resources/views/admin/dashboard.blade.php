@extends('layouts.admin')

@section('title', 'Panel de control')

@section('content')

    <section class="space-y-6">

        <header>
        

            <h1 class="mt-8 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                Panel de control
            </h1>

            <p class="mt-3 text-slate-600">
                Gestión administrativa de la Escuela CDEF Patrocinio.
            </p>
        </header>

        <article
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
        >
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl font-black text-green-700"
                >
                    ✓
                </div>

                <div class="min-w-0 flex-1">

                    <h2 class="mt-2 text-2xl font-extrabold text-slate-900">
                        Acceso correcto
                    </h2>

                    <p class="mt-3 leading-7 text-slate-600">
                        Has iniciado sesión correctamente y el sistema reconoce
                        tu cuenta de administrador.
                    </p>

                    <dl
                        class="mt-6 grid gap-5 border-t border-slate-200 pt-6 sm:grid-cols-2"
                    >
                        <div>
                            <dt class="text-sm font-bold text-slate-500">
                                Administrador
                            </dt>

                            <dd class="mt-1 font-bold text-slate-900">
                                {{ auth()->user()->name }}
                            </dd>
                        </div>

                        <div>
                            <dt class="text-sm font-bold text-slate-500">
                                Correo electrónico
                            </dt>

                            <dd class="mt-1 break-all text-slate-900">
                                {{ auth()->user()->email }}
                            </dd>
                        </div>
                    </dl>

                </div>
            </div>
        </article>

    </section>

@endsection