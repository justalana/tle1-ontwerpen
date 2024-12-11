<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Requirement;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vacancy $vacancy)
    {
        $requirements = $vacancy->requirements;

        return view('applications.apply', ['vacancy' => $vacancy, 'requirements' => $requirements]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vacancy $vacancy)
    {

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $vacancy->id,
            'status' => 1, //pending=1 accepted=2 denied=3
        ]);

        $application->requirements()->sync($request->requirements ?? []);

        $application->save();

        return to_route('applications.show', $application);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $requirements = $application->requirements;
        $vacancy = $application->vacancy;
        $user = auth()->user();

        return view('applications.details', ['requirements' => $requirements, 'vacancy' => $vacancy, 'user' => $user, 'application' => $application]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
