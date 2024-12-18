<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationQueued;
use App\Models\Application;
use App\Models\ApplicationTimeSlot;
use App\Models\Requirement;
use App\Models\TimeSlot;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Mail;

class ApplicationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:employee', only: ['create', 'store']),
            new Middleware('can:view-application,application,vacancy', only: ['show']),
        ];
    }
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
        $timeSlots = $vacancy->timeSlots;

        return view('applications.apply', ['vacancy' => $vacancy, 'requirements' => $requirements, 'timeSlots' => $timeSlots]);
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

        $application->timeSlots()->sync($request->timeSlots ?? []);

        $applications = Application::where('vacancy_id', $vacancy->id && 'status', 1)->get();

        Mail::to(auth()->user()->email)->send(new ApplicationQueued($vacancy, $applications));

        return to_route('applications.show', $application);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $user = auth()->user();
        $requirements = $application->requirements;
        $vacancy = $application->vacancy;
        $timeSlots = $application->timeSlots;

        return view('applications.details', ['requirements' => $requirements, 'vacancy' => $vacancy, 'user' => $user, 'application' => $application, 'timeSlots' => $timeSlots]);
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
