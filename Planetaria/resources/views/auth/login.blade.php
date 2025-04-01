
@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');">
    <div class="w-full sm:max-w-md px-8 py-6 bg-black bg-opacity-80 text-white shadow-lg rounded-lg backdrop-blur-md">
    
        <!-- Debug : Vérifier si cette page se charge bien -->
        {{-- <p class="text-red-500 text-center">DEBUG : Page chargée</p> --}}
        
        <!-- Titre -->
        <h2 class="text-center text-2xl font-semibold mb-6">Connexion</h2>

        <!-- Formulaire de connexion -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

            <!-- Se souvenir de moi -->
            <div class="remember-me-container">
                <input type="checkbox" id="remember_me" name="remember" class="remember-me-checkbox">
                <label for="remember_me" class="remember-me-label">Se souvenir de moi</label>
            </div>





            <!-- Boutons -->
            <div class="flex flex-col space-y-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    Connexion
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-400 hover:underline text-center" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
