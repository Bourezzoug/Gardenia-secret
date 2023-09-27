<?php

namespace App\Http\Controllers;

use App\Models\Formulaire;
use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'nom_complet'   => 'nullable|string',
            'email'         => 'required|unique:formulaires|email',
            'ville'         => 'nullable|string',
            'telephone'     => 'nullable|string',
        ]);

        $person = Formulaire::create([
            'nom_complet'   =>  $request->nom_complet,
            'email'   =>  $request->email,
            'ville'   =>  $request->ville,
            'telephone'   =>  $request->telephone,
        ]);

        return redirect('/');
    }
}
