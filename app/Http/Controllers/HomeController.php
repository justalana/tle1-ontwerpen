<?php

namespace App\Http\Controllers;
use App\Models\Vacancy;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all()->take(2);
        //$vacancies = Vacancy::all();
        return view('home', compact('vacancies'));
    }
}
