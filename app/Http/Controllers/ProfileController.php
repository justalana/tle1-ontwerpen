<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {

        $user = auth()->user();


        return view('profile.edit', compact('user'));
    }

    // Profiel bijwerken
    public function update(Request $request)
    {
        // Validatie van invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(), // Zorg ervoor dat het huidige e-mailadres wordt uitgesloten
            'phone_number' => 'nullable|string|max:15',

        ]);

        // Haal de ingelogde gebruiker op
        $user = auth()->user();

        // Werk de gegevens bij
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,

        ]);


        session()->flash('status', 'Je profiel is succesvol bijgewerkt.');


        return redirect()->route('profile.edit');
    }

    // Wachtwoord bijwerken
    public function updatePassword(Request $request)
    {
        // Validatie van wachtwoordvelden
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', // Wachtwoord moet minimaal 8 tekens zijn
        ]);

        // Haal de ingelogde gebruiker op
        $user = auth()->user();


        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Het huidige wachtwoord is onjuist.']);
        }

        // Werk het wachtwoord bij
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);


        session()->flash('status', 'Je wachtwoord is succesvol bijgewerkt.');


        return redirect()->route('profile.edit');
    }
}
