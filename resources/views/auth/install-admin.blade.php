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
        content="Creación del primer administrador de la Escuela CDEF Patrocinio."
    >

    <title>
        Crear administrador | CDEF Patrocinio
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
                Crear administrador
            </h1>

            <p class="mt-4 max-w-3xl leading-7 text-gray-600">
                Crea el primer usuario administrador que tendrá acceso al
                panel de control de la escuela.
            </p>

            <p class="mt-2 max-w-3xl leading-7 text-gray-600">
                Este formulario solamente podrá utilizarse una vez.
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

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            id="install-admin-form"
            action="{{ route('admin.install.store') }}"
            method="POST"
            class="mt-8 space-y-8"
        >
            @csrf

            {{-- Datos del administrador --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 1
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Datos del administrador
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Introduce los datos personales y de acceso del primer
                        administrador.
                    </p>

                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    {{-- Nombre --}}
                    <div>
                        <label
                            for="name"
                            class="block font-semibold"
                        >
                            Nombre
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚÜÑáéíóúüñ' -]+"
                            title="Introduce únicamente letras, espacios, apóstrofes o guiones"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Ejemplo: Mario Bello"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('name')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        @error('name')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror
                    </div>

                    {{-- Correo electrónico --}}
                    <div>
                        <label
                            for="email"
                            class="block font-semibold"
                        >
                            Correo electrónico
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            maxlength="255"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            spellcheck="false"
                            placeholder="Ejemplo: admin@patrocinio.es"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('email')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Este correo se utilizará para iniciar sesión.
                        </p>

                        @error('email')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div>
                        <label
                            for="password"
                            class="block font-semibold"
                        >
                            Contraseña
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            minlength="8"
                            required
                            autocomplete="new-password"
                            placeholder="Mínimo 8 caracteres"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('password')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Utiliza al menos 8 caracteres.
                        </p>

                        @error('password')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div>
                        <label
                            for="password_confirmation"
                            class="block font-semibold"
                        >
                            Confirmar contraseña
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            minlength="8"
                            required
                            autocomplete="new-password"
                            placeholder="Repite la contraseña"
                            class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100"
                        >

                        <p
                            id="password-match-message"
                            class="mt-2 hidden text-sm font-medium"
                        ></p>
                    </div>

                    {{-- Token de instalación --}}
                    <div class="md:col-span-2">

                        <label
                            for="install_token"
                            class="block font-semibold"
                        >
                            Token de instalación
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="install_token"
                            name="install_token"
                            type="password"
                            required
                            autocomplete="off"
                            placeholder="Introduce el token configurado en el archivo .env"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none transition focus:border-text-club focus:ring-4 focus:ring-purple-100
                                @error('install_token')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror"
                        >

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            El token de instalación es una clave privada
                            configurada en el archivo
                            <strong>.env</strong>.
                        </p>

                        @error('install_token')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

            </section>

            {{-- Información de seguridad --}}
            <section class="rounded-2xl bg-white p-6 shadow-lg sm:p-8">

                <div class="border-b border-gray-200 pb-5">

                    <p class="text-sm font-bold uppercase tracking-wider text-text-club">
                        Paso 2
                    </p>

                    <h2 class="mt-2 text-2xl font-black text-text-primary">
                        Confirmación de seguridad
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        Revisa esta información antes de crear el administrador.
                    </p>

                </div>

                <div class="mt-6 rounded-xl border border-gray-200 bg-gray-50 p-5">

                    <h3 class="font-bold text-text-primary">
                        Información importante
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-gray-700">
                        El usuario que crees tendrá acceso al área privada y
                        al panel de administración de la escuela.
                    </p>

                    <p class="mt-3 text-sm leading-6 text-gray-700">
                        Después de crear el primer usuario, esta página quedará
                        bloqueada para evitar que otras personas puedan crear
                        administradores sin autorización.
                    </p>

                </div>

            </section>

            {{-- Primer clic: revisar --}}
            <button
                id="review-admin-button"
                type="button"
                class="w-full rounded-xl border-2 border-text-club bg-white px-6 py-4 text-lg font-bold text-text-club shadow-md transition duration-300 hover:bg-purple-50"
            >
                Revisar administrador
            </button>

        </form>

    </main>

    {{-- Modal de confirmación --}}
    <div
        id="admin-review-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4"
        role="dialog"
        aria-modal="true"
        aria-labelledby="admin-review-title"
    >
        <section
            class="max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-2xl bg-white p-6 shadow-2xl sm:p-8"
        >

            <h2
                id="admin-review-title"
                class="text-2xl font-black text-text-primary"
            >
                Revisa los datos del administrador
            </h2>

            <p class="mt-3 leading-7 text-gray-600">
                Comprueba que la información sea correcta. El administrador
                no se creará hasta que pulses
                «Confirmar y crear».
            </p>

            <div class="mt-6 space-y-4 rounded-xl bg-gray-50 p-5">

                <div class="rounded-xl border border-gray-200 bg-white p-4">

                    <p class="text-sm font-semibold text-gray-500">
                        Nombre
                    </p>

                    <p
                        id="review-admin-name"
                        class="mt-1 font-bold text-text-primary"
                    ></p>

                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-4">

                    <p class="text-sm font-semibold text-gray-500">
                        Correo electrónico
                    </p>

                    <p
                        id="review-admin-email"
                        class="mt-1 font-bold text-text-primary"
                    ></p>

                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-4">

                    <p class="text-sm font-semibold text-gray-500">
                        Contraseña
                    </p>

                    <p class="mt-1 font-bold text-text-primary">
                        Protegida y oculta por seguridad
                    </p>

                </div>

            </div>

            <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <button
                    id="continue-editing-admin-button"
                    type="button"
                    class="rounded-xl border-2 border-text-club bg-white px-6 py-3 font-bold text-text-club shadow-sm transition duration-300 hover:bg-purple-50"
                >
                    ← Corregir datos
                </button>

                <button
                    id="confirm-admin-button"
                    type="button"
                    class="rounded-xl border-2 border-text-club bg-white px-6 py-3 font-bold text-text-club shadow-sm transition duration-300 hover:bg-purple-50"
                >
                    Confirmar y crear
                </button>

            </div>

        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('install-admin-form');

            const reviewButton = document.getElementById(
                'review-admin-button'
            );

            const modal = document.getElementById(
                'admin-review-modal'
            );

            const continueEditingButton = document.getElementById(
                'continue-editing-admin-button'
            );

            const confirmButton = document.getElementById(
                'confirm-admin-button'
            );

            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            const passwordConfirmationInput = document.getElementById(
                'password_confirmation'
            );

            const passwordMatchMessage = document.getElementById(
                'password-match-message'
            );

            const reviewName = document.getElementById(
                'review-admin-name'
            );

            const reviewEmail = document.getElementById(
                'review-admin-email'
            );

            function validatePasswords() {
                const password = passwordInput.value;
                const confirmation = passwordConfirmationInput.value;

                if (confirmation === '') {
                    passwordMatchMessage.classList.add('hidden');
                    return false;
                }

                passwordMatchMessage.classList.remove('hidden');

                if (password === confirmation) {
                    passwordMatchMessage.textContent =
                        'Las contraseñas coinciden.';

                    passwordMatchMessage.classList.remove('text-red-600');
                    passwordMatchMessage.classList.add('text-green-600');

                    return true;
                }

                passwordMatchMessage.textContent =
                    'Las contraseñas no coinciden.';

                passwordMatchMessage.classList.remove('text-green-600');
                passwordMatchMessage.classList.add('text-red-600');

                return false;
            }

            passwordInput.addEventListener(
                'input',
                validatePasswords
            );

            passwordConfirmationInput.addEventListener(
                'input',
                validatePasswords
            );

            reviewButton.addEventListener('click', () => {
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                if (!validatePasswords()) {
                    passwordConfirmationInput.focus();
                    return;
                }

                reviewName.textContent = nameInput.value.trim();
                reviewEmail.textContent = emailInput.value.trim();

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                document.body.classList.add('overflow-hidden');
            });

            continueEditingButton.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');

                document.body.classList.remove('overflow-hidden');
            });

            confirmButton.addEventListener('click', () => {
                confirmButton.disabled = true;
                confirmButton.textContent = 'Creando administrador...';

                form.submit();
            });

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');

                    document.body.classList.remove('overflow-hidden');
                }
            });

            document.addEventListener('keydown', (event) => {
                if (
                    event.key === 'Escape' &&
                    !modal.classList.contains('hidden')
                ) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');

                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>

</body>

</html>