<?php

namespace App\Http\Controllers;

use App\Models\BoxMoisSubscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator; 

class BoxMoisSubscriberController extends Controller
{
    public function store(Request $request) {
        $rules = [
            'nom_complet' => 'required|string|min:3',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(BoxMoisSubscriber::class)],
            'ville' => 'required|string|min:3',
            'telephone' => ['required', 'string', 'min:10', 'max:10', Rule::unique(BoxMoisSubscriber::class)],
            'addresse' => 'required|string',
            'remarque' => 'nullable|string',
        ];

        // Create a new Validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Return the error response with the error messages
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
    
        BoxMoisSubscriber::create([
            'nom_complet'   =>  $request->nom_complet,
            'email'   =>  $request->email,
            'ville'   =>  $request->ville,
            'telephone'   =>  $request->telephone,
            'addresse'   =>  $request->addresse,
            'remarque'   =>  $request->remarque,
        ]);
    
    // Get the total count of records
    $totalCount = BoxMoisSubscriber::count();

    // Return the total count along with the success response
    return response()->json(['success' => true, 'totalCount' => $totalCount]);
    }
}
