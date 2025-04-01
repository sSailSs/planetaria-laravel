@extends('layouts.app')

@section('title', 'Liste des Planètes')

@section('content')
    <h2>🌍 Liste des Planètes</h2>

    {{-- 🔍 Barre de recherche par catégorie --}}
    <form method="GET" action="{{ route('planets.index') }}" class="mb-4">
        <label for="category">Filtrer par catégorie :</label>
        <select name="category" onchange="this.form.submit()">
            <option value="">-- Toutes --</option>
            <option value="planète" {{ request('category') == 'planète' ? 'selected' : '' }}>Planète</option>
            <option value="exoplanète" {{ request('category') == 'exoplanète' ? 'selected' : '' }}>Exoplanète</option>
            <option value="satellite" {{ request('category') == 'satellite' ? 'selected' : '' }}>Satellite</option>
        </select>
    </form>

    {{-- 📤 Bouton d’ajout --}}
    <div class="page-content">
        <a href="{{ route('planets.create') }}" class="btn btn-primary">Ajouter une Planète</a>
    </div>

    {{-- 📝 Formulaire de sélection pour comparaison --}}
    <form method="GET" action="{{ route('planets.compare') }}">
        <table class="table">
            <thead>
                <tr>
                    <th>Sélection</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Taille (km)</th>
                    <th>Distance (millions km)</th>
                    <th>Gravité (m/s²)</th>
                    <th>Atmosphère</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planets as $planet)
                    <tr>
                        <td>
                            <input type="checkbox" name="planets[]" value="{{ $planet->id }}" class="planet-checkbox">
                        </td>
                        <td>{{ $planet->name }}</td>
                        <td>{{ $planet->type }}</td>
                        <td>{{ number_format($planet->size, 0, ',', ' ') }}</td>
                        <td>{{ $planet->distance }}</td>
                        <td>{{ $planet->gravity }}</td>
                        <td>{{ $planet->atmosphere }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- 🧪 Bouton de comparaison --}}
        <button type="submit" class="btn btn-warning mt-3" id="compare-btn" disabled>
            🔍 Lancer la comparaison
        </button>
    </form>

    {{-- 💡 Script : Active le bouton si au moins 2 cases sont cochées --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.planet-checkbox');
            const compareBtn = document.getElementById('compare-btn');

            function toggleButton() {
                const checkedCount = document.querySelectorAll('.planet-checkbox:checked').length;
                compareBtn.disabled = checkedCount < 2;
            }

            checkboxes.forEach(cb => cb.addEventListener('change', toggleButton));
        });
    </script>
@endsection
