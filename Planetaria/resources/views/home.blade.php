@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="flex flex-col lg:flex-row gap-6 p-6">
    <!-- Bloc de gauche -->
    <div class="bg-gray-900 p-6 rounded-2xl shadow-lg flex-1">
        <h2 class="text-3xl font-bold mb-4">Bienvenue sur Planétaria 🌍</h2>
        <p class="text-lg text-gray-200">
            Planétaria est une application web interactive permettant d'explorer et de comparer les différentes planètes du système solaire.
            Tu peux consulter des fiches détaillées, ajouter de nouvelles planètes, et même en comparer plusieurs selon leurs caractéristiques principales.
        </p>
    </div>

    <!-- Bloc de droite -->
    <div class="bg-gray-900 p-6 rounded-2xl shadow-lg flex-1">
        <h3 class="text-2xl font-semibold mb-4">🆕 Dernières planètes ajoutées</h3>
        <ul class="list-disc list-inside text-white space-y-2">
            @forelse($lastPlanets as $planet)
                <li>
                    <strong>{{ strtoupper($planet->name) }}</strong> ({{ $planet->type }}) – Gravité : {{ $planet->gravity }} m/s²
                </li>
            @empty
                <li class="text-gray-400">Aucune planète ajoutée pour l’instant.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
