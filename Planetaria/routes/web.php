<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Planet;
use App\Models\User;

Route::view('/mentions-legales', 'mentions')->name('mentions');

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route personnalisée (non couverte par resource)
Route::get('/planets/compare', [PlanetController::class, 'compare'])->name('planets.compare');

// Toutes les routes CRUD des planètes (inclut index, create, store, edit, update, destroy, show)
Route::resource('planets', PlanetController::class);

Route::delete('/admin/users/{user}', [ProfileController::class, 'adminDestroy'])->name('admin.users.destroy');
// Authentification
Route::middleware('auth')->group(function () {
    // Route du tableau de bord
    Route::get('/dashboard', function () {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        $userPlanets = $user->planets()->latest()->get(); // Récupère les planètes de l'utilisateur

        // Si l'utilisateur est admin, récupérer toutes les planètes et tous les utilisateurs
        if ($user->is_admin) {
            $allPlanets = Planet::all();  // Récupère toutes les planètes
            $allUsers = User::all();  // Récupère tous les utilisateurs
            return view('dashboard', compact('allPlanets', 'allUsers', 'userPlanets'));
        }

        // Sinon, seulement les planètes de l'utilisateur connecté
        return view('dashboard', compact('userPlanets'));
    })->name('dashboard');

    // Route pour modifier le profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
