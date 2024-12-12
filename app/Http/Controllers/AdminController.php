<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function userIndex() {
        $users = User::paginate(50);

        return view('admin.user-index', ['users' => $users]);
    }

    public function userEdit(User $user) {
        return view('admin.user-edit', ['user' => $user]);
    }

    public function userUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'phoneNumber' => ['max:255'],
            'role' => ['required', 'max:255', 'numeric'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->role = $request->role;
        $user->branch_id = $request->branch ?? null;

        $user->update();

        return to_route('admin.user-index');
    }

}
