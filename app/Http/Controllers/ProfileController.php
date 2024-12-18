<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Toon het profiel van de gebruiker
    public function show()
    {
        $user = auth()->user();  // Haal de ingelogde gebruiker op
        return view('profile.edit', compact('user'));
    }

    // Toon het profiel van de werkgever
    public function employer()
    {
        $user = auth()->user();

        // Check of de gebruiker role 2 heeft (werkgever)
        if ($user->role !== 2) {
            return redirect()->route('home')->with('error', 'Toegang geweigerd, alleen werkgevers kunnen deze pagina bekijken.');
        }

        return view('profile.employer', compact('user'));
    }

    // Bewerk het profiel
    public function edit()
    {
        $user = auth()->user();

        // Controleer of de gebruiker role 2 (werkgever) is en laat hem zijn gegevens bewerken
        if ($user->role == 2) {
            return view('profile.edit', compact('user'));  // Werkgever mag zijn gegevens bewerken
        }

        // Werknemer mag ook zijn gegevens bewerken
        return view('profile.edit', compact('user'));  // Werknemer mag zijn gegevens bewerken
    }

    // Werk het profiel bij
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user = auth()->user();

        // Update gegevens
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        session()->flash('status', 'Je profiel is succesvol bijgewerkt.');

        // Controleer de rol en stuur naar de juiste pagina
        if ($user->role == 2) {
            return redirect()->route('profile.employer');  // Redirect naar de employer view voor role 2
        }

        return redirect()->route('profile.edit');
    }

    // Wachtwoord bijwerken
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        // Controleer of het huidige wachtwoord klopt
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Het huidige wachtwoord is onjuist.']);
        }

        // Werk het wachtwoord bij
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        session()->flash('status', 'Je wachtwoord is succesvol bijgewerkt.');

        // Controleer de rol en stuur naar de juiste pagina
        if ($user->role == 2) {
            return redirect()->route('profile.employer');  // Redirect naar de employer view voor role 2
        }

        return redirect()->route('profile.show');  // Redirect naar de edit view voor role 1
    }
}
