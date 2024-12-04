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
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    // Bewerk het profiel
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
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
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Het huidige wachtwoord is onjuist.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        session()->flash('status', 'Je wachtwoord is succesvol bijgewerkt.');
        return redirect()->route('profile.edit');
    }
}
