<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

final class SchoolController extends Controller
{
    /**
     * Muestra la información pública de la escuela.
     */
    public function index(): View
    {
        return view('school.index');
    }
}