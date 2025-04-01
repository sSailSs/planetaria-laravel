<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planets = Planet::all();
        return view('planets.index', compact('planets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une planète.');
        }

        return view('planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20', 'not_regex:/(grosmot|insulte|trucméchant)/i'],
            'type' => ['required', 'string', 'max:20'],
            'category' => ['required', 'in:planète,exoplanète,satellite'],
            'size' => ['required', 'integer', 'min:1', 'max:200000'],
            'distance' => ['required', 'numeric', 'min:0', 'max:100000'],
            'gravity' => ['required', 'numeric', 'min:0', 'max:100'],
            'atmosphere' => ['required', 'string', 'max:255'],
            'image' => 'nullable|string',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 20 caractères.',
            'name.not_regex' => 'Le nom contient des mots inappropriés.',

            'type.required' => 'Le type est obligatoire.',
            'type.max' => 'Le type ne doit pas dépasser 20 caractères.',

            'category.required' => 'La catégorie est obligatoire.',
            'category.in' => 'La catégorie sélectionnée est invalide.',

            'size.required' => 'La taille est obligatoire.',
            'size.integer' => 'La taille doit être un nombre entier.',
            'size.max' => 'La taille ne doit pas dépasser 200 000 km.',

            'distance.required' => 'La distance est obligatoire.',
            'distance.numeric' => 'La distance doit être un nombre.',
            'distance.max' => 'La distance ne doit pas dépasser 100 000 millions de km.',

            'gravity.required' => 'La gravité est obligatoire.',
            'gravity.numeric' => 'La gravité doit être un nombre.',
            'gravity.max' => 'La gravité ne doit pas dépasser 100 m/s².',

            'atmosphere.required' => 'L’atmosphère est obligatoire.',
            'atmosphere.max' => 'L’atmosphère ne doit pas dépasser 255 caractères.',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une planète.');
        }

        Planet::create([
            'name' => $request->name,
            'category' => $request->category,
            'type' => $request->type,
            'size' => $request->size,
            'distance' => $request->distance,
            'gravity' => $request->gravity,
            'atmosphere' => $request->atmosphere,
            'image' => $request->image,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('planets.index')->with('success', 'Planète ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        return view('planets.edit', compact('planet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planet $planet)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'type' => 'required|string|max:20',
            'category' => 'required|in:planète,exoplanète,satellite',
            'size' => 'required|integer|max:200000',
            'distance' => 'required|numeric|max:100000',
            'gravity' => 'required|numeric|max:100',
            'atmosphere' => 'required|string|max:255',
        ]);

        $planet->update([
            'name' => $request->name,
            'type' => $request->type,
            'category' => $request->category,
            'size' => $request->size,
            'distance' => $request->distance,
            'gravity' => $request->gravity,
            'atmosphere' => $request->atmosphere,
        ]);

        return redirect()->route('dashboard')->with('success', 'Planète mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        $planet->delete();

        return redirect()->route('dashboard')->with('success', 'Planète supprimée avec succès.');
    }

    public function compare(Request $request)
    {
        $planetIds = $request->input('planets', []);

        if (count($planetIds) < 2) {
            return redirect()->route('planets.index')->with('error', 'Sélectionne au moins deux planètes à comparer.');
        }

        $selectedPlanets = Planet::whereIn('id', $planetIds)->get();

        return view('planets.compare', compact('selectedPlanets'));
    }
}
