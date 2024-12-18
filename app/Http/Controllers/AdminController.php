<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HTMLSanitizer\HtmlSanitizer;
use Symfony\Component\HTMLSanitizer\HtmlSanitizerConfig;

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

        $htmlSanitizer = new HtmlSanitizer(
            (new HtmlSanitizerConfig())->allowSafeElements()
        );

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'phoneNumber' => ['max:255'],
            'role' => ['required', 'max:255', 'numeric'],

        ]);

        $sanitized_name = $htmlSanitizer->sanitize($request->name);
        $sanitized_email = $htmlSanitizer->sanitize($request->email);
        $sanitized_phoneNumber = $htmlSanitizer->sanitize($request->phoneNumber);


        $user->name = $sanitized_name;
        $user->email = $sanitized_email;
        $user->phone_number = $sanitized_phoneNumber;
        $user->role = $request->role;
        $user->branch_id = $request->branch ?? null;
        $user->update();

        return to_route('admin.user-index');
    }

}
