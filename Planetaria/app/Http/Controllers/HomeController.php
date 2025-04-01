<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planet;

class HomeController extends Controller
{  
    public function index()
    {
        // Récupère les 5 dernières planètes ajoutées
        $lastPlanets = Planet::latest()->take(5)->get();

        return view('home', compact('lastPlanets'));
}
}