@props([
    'mode' => 'public',
])

<header
    class="sticky top-0 z-50 w-full border-b border-white/10 shadow-md h-16"
    style="background-color: var(--color-primary, #8B328C);"
>
    <div
class="mx-auto flex h-16 max-w-7xl items-center px-4 sm:px-6 lg:px-8"    >

        @if ($mode === 'public')

            {{-- Acceso público --}}
            <form
                action="{{ route('login.store') }}"
                method="POST"
                class="flex w-full items-center justify-end gap-4 h-16"
            >
                @csrf

                 {{-- Correo electrónico --}}
    <div class="relative w-full sm:w-64">

        <input
            id="header_email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Correo electrónico"
            autocomplete="email"
            required
            class="h-10 w-full min-w-0 rounded-xl border border-white/40 bg-white px-4 text-sm font-medium text-slate-800 shadow-sm outline-none transition duration-200 placeholder:text-slate-400 focus:border-white focus:ring-2 focus:ring-white/30"
        >

    </div>

    {{-- Contraseña --}}
    <div class="relative w-full sm:w-56">

        <input
            id="header_password"
            type="password"
            name="password"
            placeholder="Contraseña"
            autocomplete="current-password"
            required
            class="h-10 w-full min-w-0 rounded-xl border border-white/40 bg-white px-4 text-sm font-medium text-slate-800 shadow-sm outline-none transition duration-200 placeholder:text-slate-400 focus:border-white focus:ring-2 focus:ring-white/30"
        >

    </div>

               <button
    type="submit"
    class="group relative flex h-12 items-center gap-2 border-0 bg-transparent px-2 text-sm font-bold text-white transition duration-300 focus:outline-none"
>
    

    <span>
        Iniciar sesión
    </span>

    <span
        class="absolute bottom-1 left-0 h-0.5 w-full origin-left scale-x-0 rounded-full bg-white transition-transform duration-300 group-hover:scale-x-100"
        aria-hidden="true"
    ></span>
</button>
            </form>

    @elseif ($mode === 'admin')

    <nav
        class="flex h-16 w-full items-center justify-between"
        aria-label="Menú de administración"
    >
        {{-- Navegación izquierda --}}
        <div class="flex items-center gap-6">

            {{-- Panel principal --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="group relative inline-flex h-10 items-center gap-2 whitespace-nowrap text-sm font-bold text-white no-underline"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 12 12 3l9 9"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 10v10h14V10M9 20v-6h6v6"
                    />
                </svg>

                <span>Panel</span>

                <span
                    class="absolute bottom-0 left-0 h-0.5 w-full origin-left rounded-full bg-white transition-transform duration-300
                        {{ request()->routeIs('admin.dashboard')
                            ? 'scale-x-100'
                            : 'scale-x-0 group-hover:scale-x-100' }}"
                    aria-hidden="true"
                ></span>
            </a>

            {{-- Jugadores --}}
            <a
                href="{{ route('admin.players.index') }}"
                class="group relative inline-flex h-10 items-center gap-2 whitespace-nowrap text-sm font-bold text-white no-underline"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                    />

                    <circle
                        cx="9"
                        cy="7"
                        r="4"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"
                    />
                </svg>

                <span>Jugadores</span>

                <span
                    class="absolute bottom-0 left-0 h-0.5 w-full origin-left rounded-full bg-white transition-transform duration-300
                        {{ request()->routeIs('admin.players.*')
                            ? 'scale-x-100'
                            : 'scale-x-0 group-hover:scale-x-100' }}"
                    aria-hidden="true"
                ></span>
            </a>

        </div>

        {{-- Cerrar sesión --}}
        <form
            action="{{ route('logout') }}"
            method="POST"
            class="m-0"
        >
            @csrf

            <button
                type="submit"
                class="group relative inline-flex h-10 items-center gap-2 whitespace-nowrap border-0 bg-transparent p-0 text-sm font-bold text-white focus:outline-none"
            >
                <svg
                    class="h-5 w-5 shrink-0 transition-transform duration-300 group-hover:translate-x-0.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0
                           13.5 3h-6A2.25 2.25 0 0 0
                           5.25 5.25v13.5A2.25 2.25 0 0 0
                           7.5 21h6a2.25 2.25 0 0 0
                           2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"
                    />
                </svg>

                <span>Cerrar sesión</span>

                <span
                    class="absolute bottom-0 left-0 h-0.5 w-full origin-left scale-x-0 rounded-full bg-white transition-transform duration-300 group-hover:scale-x-100"
                    aria-hidden="true"
                ></span>
            </button>
        </form>
    </nav>

@endif

    </div>
</header>