@extends('layouts.app')

@section('title', 'Modifier mon profil')

@section('content')
    <div class="form-container">
        <h2>👤 Modifier mon profil</h2>

        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse e-mail</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe (laisser vide pour ne pas changer)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">💾 Enregistrer les modifications</button>
        </form>
    </div>
@endsection
