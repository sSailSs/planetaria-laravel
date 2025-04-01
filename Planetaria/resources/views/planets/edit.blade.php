@extends('layouts.app')

@section('title', 'Modifier la planète')

@section('content')
    <h2>✏️ Modifier la planète</h2>

    <div class="page-content">
        <form action="{{ route('planets.update', $planet->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name', $planet->name) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-3">
                <label class="form-label">Catégorie :</label>
                <select name="category" class="form-control custom-select" required>
                    <option value="planète" {{ $planet->category === 'planète' ? 'selected' : '' }}>🌍 Planète</option>
                    <option value="exoplanète" {{ $planet->category === 'exoplanète' ? 'selected' : '' }}>🪐 Exoplanète</option>
                    <option value="satellite" {{ $planet->category === 'satellite' ? 'selected' : '' }}>🌕 Satellite</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="type" class="block font-semibold">Type</label>
                <input type="text" id="type" name="type" value="{{ old('type', $planet->type) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="size" class="block font-semibold">Taille (en km)</label>
                <input type="number" id="size" name="size" value="{{ old('size', $planet->size) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="distance" class="block font-semibold">Distance du Soleil (en millions de km)</label>
                <input type="number" step="0.01" id="distance" name="distance" value="{{ old('distance', $planet->distance) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="gravity" class="block font-semibold">Gravité (en m/s²)</label>
                <input type="number" step="0.01" id="gravity" name="gravity" value="{{ old('gravity', $planet->gravity) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="atmosphere" class="block font-semibold">Atmosphère</label>
                <input type="text" id="atmosphere" name="atmosphere" value="{{ old('atmosphere', $planet->atmosphere) }}" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Si tu ajoutes une image plus tard --}}
            {{-- <div>
                <label for="image" class="block font-semibold">Image (URL)</label>
                <input type="text" id="image" name="image" value="{{ old('image', $planet->image) }}"
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> --}}

            <div class="mt-6 flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                    💾 Enregistrer
                </button>
                <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-2 rounded">
                    ⬅️ Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
