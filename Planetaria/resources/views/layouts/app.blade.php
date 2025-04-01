<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Planétaria')</title>

    <!-- Liens vers les fichiers CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Ajout de Tailwind (optionnel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Barre de Navigation uniquement si on n'est PAS sur la page d'accueil -->
    @if (!request()->routeIs('welcome'))
        <nav class="navbar">
            <a href="{{ route('home') }}" class="logo">🌍 Planétaria</a>

            <div class="nav-group">
                <div class="nav-links">
                    <a href="{{ route('planets.index') }}">Liste des planètes</a>
                    <a href="{{ route('planets.create') }}">Ajouter une planète</a>

                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}">Se connecter</a>
                        <a href="{{ route('register') }}">S'inscrire</a>
                    @endguest
                </div>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">
                            Se déconnecter
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    @endif

    <!-- Contenu principal -->
    <main class="container">
        @yield('content')
    </main>

</body>
</html>
