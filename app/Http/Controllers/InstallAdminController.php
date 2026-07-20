<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class InstallAdminController extends Controller
{
    /**
     * Mostrar el formulario para crear el primer administrador.
     */
    public function create(): View
    {
        // Si ya existe algún usuario, bloqueamos esta instalación.
        abort_if(User::query()->exists(), 403, 'El administrador ya ha sido creado.');

        return view('auth.install-admin');
    }

    /**
     * Guardar el primer administrador.
     */
    public function store(Request $request): RedirectResponse
    {
        // Evita que se puedan crear más usuarios desde esta ruta.
        abort_if(User::query()->exists(), 403, 'El administrador ya ha sido creado.');

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'install_token' => ['required', 'string'],
        ]);

        abort_unless(
            hash_equals(
                (string) config('app.install_admin_token'),
                (string) $validated['install_token']
            ),
            403,
            'El token de instalación no es correcto.'
        );

        User::query()->create([
            'name' => $validated['name'],
            'email' => mb_strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Administrador creado correctamente. Ya puedes iniciar sesión.');
    }
}