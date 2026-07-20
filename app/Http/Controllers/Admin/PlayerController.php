<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class PlayerController extends Controller
{
    /**
     * Muestra el listado de jugadores y procesa los filtros.
     */
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'search' => [
                'nullable',
                'string',
                'max:100',
            ],
            'dni' => [
                'nullable',
                'string',
                'max:20',
            ],
            'category_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
            ],
            'status' => [
                'nullable',
                'in:pending,active,inactive',
            ],
        ]);

        $search = trim((string) ($filters['search'] ?? ''));
        $dni = trim((string) ($filters['dni'] ?? ''));
        $categoryId = $filters['category_id'] ?? null;
        $status = $filters['status'] ?? null;

        $players = Player::query()
            ->with('category')

            // Buscar por nombre o apellidos.
            ->when(
                $search !== '',
                function (Builder $query) use ($search): void {
                    $query->where(function (Builder $query) use ($search): void {
                        $query
                            ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")
                            ->orWhere('second_last_name', 'like', "%{$search}%");
                    });
                }
            )

            // Buscar por DNI.
            ->when(
                $dni !== '',
                function (Builder $query) use ($dni): void {
                    $query->where('dni', 'like', "%{$dni}%");
                }
            )

            // Filtrar por categoría.
            ->when(
                filled($categoryId),
                function (Builder $query) use ($categoryId): void {
                    $query->where('category_id', (int) $categoryId);
                }
            )

            // Filtrar por estado.
            ->when(
                filled($status),
                function (Builder $query) use ($status): void {
                    $query->where('status', $status);
                }
            )

            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->orderBy('first_name')
            ->paginate(15)
            ->withQueryString();

        $categories = Category::query()
            ->where('active', true)
            ->orderBy('name')
            ->get();

        return view('admin.players.index', [
            'players' => $players,
            'categories' => $categories,
        ]);
    }

    /**
     * Muestra la ficha completa de un jugador.
     */
    public function show(Player $player): View
    {
        $player->load([
            'category',
            'guardians',
        ]);

        return view('admin.players.show', [
            'player' => $player,
        ]);
    }

/**
 * Activa un jugador.
 */
public function activate(Player $player): RedirectResponse
{
    if ($player->status === 'accepted') {
        return redirect()
            ->route('admin.players.index')
            ->with('info', 'El jugador ya estaba activo.');
    }

    $player->forceFill([
        'status' => 'accepted',
    ])->save();

    return redirect()
        ->route('admin.players.index')
        ->with('success', 'El jugador ha sido activado correctamente.');
}

/**
 * Desactiva un jugador.
 */
public function deactivate(Player $player): RedirectResponse
{
    if ($player->status === 'rejected') {
        return redirect()
            ->route('admin.players.index')
            ->with('info', 'El jugador ya estaba desactivado.');
    }

    $player->forceFill([
        'status' => 'rejected',
    ])->save();

    return redirect()
        ->route('admin.players.index')
        ->with('success', 'El jugador ha sido desactivado correctamente.');
}
}