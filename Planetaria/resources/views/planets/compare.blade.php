@extends('layouts.app')

@section('title', 'Comparateur de Planètes')

@section('content')
    <h2>🌍 Comparateur de Planètes</h2>

    @if(count($selectedPlanets) < 2)
        <p class="mt-4 text-muted">Sélectionne au moins deux planètes pour comparer leurs caractéristiques.</p>
        <a href="{{ route('planets.index') }}" class="btn btn-secondary mt-3">⬅ Retour à la liste des planètes</a>
    @else
        <h3 class="mt-4">🔍 Résultats de la comparaison</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Caractéristiques</th>
                    @foreach($selectedPlanets as $planet)
                        <th>{{ $planet->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Type</td>
                    @foreach($selectedPlanets as $planet)
                        <td>{{ $planet->type }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Taille (km)</td>
                    @foreach($selectedPlanets as $planet)
                        <td>{{ number_format($planet->size, 0, ',', ' ') }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Distance du Soleil (millions km)</td>
                    @foreach($selectedPlanets as $planet)
                        <td>{{ $planet->distance }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Gravité (m/s²)</td>
                    @foreach($selectedPlanets as $planet)
                        <td>{{ $planet->gravity }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Atmosphère</td>
                    @foreach($selectedPlanets as $planet)
                        <td>{{ $planet->atmosphere }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    @endif

    <a href="{{ route('planets.index') }}" class="btn btn-secondary mt-3">⬅ Retour à la liste des planètes</a>
@endsection
