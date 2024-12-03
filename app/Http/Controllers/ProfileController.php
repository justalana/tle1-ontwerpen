<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
// Profiel bewerken
public function edit()
{
// Haal de ingelogde gebruiker op
$user = auth()->user();

// Retourneer de profiel bewerkpagina
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

// Redirect naar de profielpagina na succesvolle update
return redirect()->route('profile.edit')->with('status', 'Profile has been edited!');
}
}
