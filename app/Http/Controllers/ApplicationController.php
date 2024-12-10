<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Requirement;
use App\Models\Vacancy;
use Illuminate\Http\Request;

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

        return view('vacancies.applications', ['vacancy' => $vacancy, 'requirements' => $requirements]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Application $application, Vacancy $vacancy)
    {
        $application->user_id = auth()->user()->id;
        $application->vacancy_id = $vacancy->id;
        $application->status = 1; //pending=1 accepted=2 denied=3

//        if (isset($request->requirements)) {
//
//            foreach ($request->requirements as $requirement) {
//                $application->requirements()->attach($requirement);
//            }
//
//        }

        $application->save();
        return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
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
