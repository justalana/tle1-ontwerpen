<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirectToDashboard()
    {
        $user = Auth::user();

        // Check if user has role 1 (Werknemer)
        if ($user->role == 1) {
            // Redirect Werknemer (employee) to their regular dashboard view
            return view('dashboard');  // Regular dashboard view for employees
        }
        // Check if user has role 2 (Werkgever)
        elseif ($user->role == 2) {
            // Redirect Werkgever (employer) to the employee dashboard
            return view('profile.employeedash');  // Employer's dashboard view
        }

        // If user role is neither 1 nor 2, show an error message
        return redirect('/')->with('error', 'Toegang geweigerd. Onbekende rol.');
    }
}
