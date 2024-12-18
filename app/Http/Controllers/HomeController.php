<?php

namespace App\Http\Controllers;
use App\Models\Vacancy;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$vacancies = Vacancy::all()->take(3)->get();
        $vacancies = Vacancy::all();
        return view('home', compact('vacancies'));
    }
}
