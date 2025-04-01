@extends('layouts.app')

@section('title', 'Créer une Planète')

@section('content')
    <h2>🪐 Ajouter une Planète</h2>
    <form action="{{ route('planets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="block font-semibold">Catégorie :</label>
            <select name="category" id="category" required
                class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="planète" {{ old('category') === 'planète' ? 'selected' : '' }}>🌍 Planète</option>
                <option value="exoplanète" {{ old('category') === 'exoplanète' ? 'selected' : '' }}>🪐 Exoplanète</option>
                <option value="satellite" {{ old('category') === 'satellite' ? 'selected' : '' }}>🌕 Satellite</option>
            </select>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label">Type :</label>
            <input type="text" name="type" class="form-control" required>
            @error('type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Taille (km) :</label>
            <input type="number" name="size" class="form-control" required>
            @error('size')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Distance du Soleil (millions km) :</label>
            <input type="number" step="0.1" name="distance" class="form-control" required>
            @error('distance')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gravité (m/s²) :</label>
            <input type="number" step="0.01" name="gravity" class="form-control" required>
            @error('gravity')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Atmosphère :</label>
            <input type="text" name="atmosphere" class="form-control" required>
            @error('atmosphere')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
