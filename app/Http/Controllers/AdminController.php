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

}
