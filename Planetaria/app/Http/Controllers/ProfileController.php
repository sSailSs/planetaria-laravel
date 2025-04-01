<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validation des champs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        'password' => 'nullable|string|min:8|confirmed', // Validation du mot de passe, il est facultatif
    ]);

    $user = $request->user();

    // Mise à jour du nom et de l'email
    $user->name = $request->name;
    $user->email = $request->email;

    // Mise à jour du mot de passe si fourni
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès !');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function adminDestroy(User $user)
{
    if (auth()->user()->is_admin && auth()->id() !== $user->id) {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé.');
    }

    return redirect()->route('dashboard')->with('error', 'Action non autorisée.');
}

public function index(Request $request)
{
    $query = Planet::query();

    if ($request->has('search') && $request->search !== null) {
        $search = $request->search;
        $query->where('name', 'like', "%$search%")
              ->orWhere('type', 'like', "%$search%");
    }

    $planets = $query->get();
    return view('planets.index', compact('planets'));
}

}
