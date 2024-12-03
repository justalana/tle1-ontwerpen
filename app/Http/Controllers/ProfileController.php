<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        // Haal de ingelogde gebruiker op
        $user = auth()->user();

        // Retourneer de profiel-edit-blade met de gebruiker
        return view('profile.edit', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        // Validatie van de wachtwoorden
        $request->validate([
            'current_password' => 'required|current_password', // Controleer of het huidige wachtwoord klopt
            'password' => 'required|string|confirmed|min:8',  // Nieuw wachtwoord vereisten
        ]);

        // Haal de ingelogde gebruiker op
        $user = auth()->user();

        // Controleer of het huidige wachtwoord overeenkomt met het ingevoerde wachtwoord
        if (!\Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.edit')->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update het wachtwoord
        $user->password = \Hash::make($request->password); // Gebruik de Hash-facade om het wachtwoord te versleutelen
        $user->save();

        // Redirect terug met een succesbericht
        return redirect()->route('profile.edit')->with('status', 'Password updated successfully!');
    }

    public function update(Request $request)
    {
        // Validatie van invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(), // Zorg ervoor dat het huidige e-mailadres wordt uitgesloten
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Haal de ingelogde gebruiker op
        $user = auth()->user();

        // Werk de gegevens bij
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Redirect met een succesmelding
        return redirect()->route('profile.edit')->with('status', 'Profile has been edited!');
    }
}
