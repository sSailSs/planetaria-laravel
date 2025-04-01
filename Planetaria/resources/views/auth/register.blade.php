@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');">
    <div class="w-full sm:max-w-md px-8 py-6 bg-black bg-opacity-80 text-white shadow-lg rounded-lg backdrop-blur-md">
    
        <!-- Titre -->
        <h2 class="text-center text-2xl font-semibold mb-6">Inscription</h2>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 w-full px-4 py-2 border rounded-md text-gray-900 bg-gray-200 focus:ring-2 focus:ring-blue-500" />
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 w-full px-4 py-2 border rounded-md text-gray-900 bg-gray-200 focus:ring-2 focus:ring-blue-500" />
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 w-full px-4 py-2 border rounded-md text-gray-900 bg-gray-200 focus:ring-2 focus:ring-blue-500" />
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation du mot de passe -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 w-full px-4 py-2 border rounded-md text-gray-900 bg-gray-200 focus:ring-2 focus:ring-blue-500" />
                @error('password_confirmation')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex flex-col space-y-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    S'inscrire
                </button>

                <a class="text-sm text-blue-400 hover:underline text-center" href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
