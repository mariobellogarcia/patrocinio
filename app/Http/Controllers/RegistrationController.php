<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Category;
use App\Models\Guardian;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

final class RegistrationController extends Controller
{
    /**
     * Muestra el formulario con las categorías activas.
     */
    public function create(): View
    {
        $categories = Category::query()
            ->where('active', true)
            ->orderBy('name')
            ->get();

        return view('registrations.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Valida y guarda el jugador y su responsable.
     */
    public function store(
        StoreRegistrationRequest $request
    ): RedirectResponse {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request): void {
            /*
             * El usuario escribe dd/mm/aaaa.
             * MySQL necesita aaaa-mm-dd.
             */
            $birthDate = Carbon::createFromFormat(
                'd/m/Y',
                $data['player']['birth_date']
            )->format('Y-m-d');

            $player = Player::create([
                'category_id' =>
                    $data['player']['category_id'],

                'first_name' =>
                    $data['player']['first_name'],

                'last_name' =>
                    $data['player']['last_name'],

                'second_last_name' =>
                    $data['player']['second_last_name'] ?? null,

                'birth_date' => $birthDate,

                'gender' =>
                    $data['player']['gender'],

                'dni' =>
                    $data['player']['dni'] ?? null,

                'contact_phone' =>
                    $data['player']['contact_phone'],

                'equipment_size' => null,
                'tracksuit_size' => null,

                'status' => 'pending',
                'registered_at' => now(),
            ]);

            $imageConsent = $request->boolean(
                'guardian.image_consent'
            );

            Guardian::create([
                'player_id' => $player->id,

                'relationship' =>
                    $data['guardian']['relationship'],

                'first_name' =>
                    $data['guardian']['first_name'],

                'last_name' =>
                    $data['guardian']['last_name'],

                'second_last_name' =>
                    $data['guardian']['second_last_name'] ?? null,

                'dni' =>
                    $data['guardian']['dni'],

                'phone' =>
                    $data['guardian']['phone'],

                'secondary_phone' =>
                    $data['guardian']['secondary_phone'] ?? null,

                'email' =>
                    $data['guardian']['email'],

                'address' =>
                    $data['guardian']['address'],

                'city' =>
                    $data['guardian']['city'],

                'postal_code' =>
                    $data['guardian']['postal_code'],

                'school_rules_accepted' => true,
                'school_rules_accepted_at' => now(),

                'privacy_accepted' => true,
                'privacy_accepted_at' => now(),

                'image_consent' => $imageConsent,

                'image_consent_at' =>
                    $imageConsent ? now() : null,

                'legal_text_version' => '2026-01',
            ]);
        });

        return redirect()
            ->route('registrations.create')
            ->with(
                'success',
                'La inscripción se ha registrado correctamente.'
            );
    }
}