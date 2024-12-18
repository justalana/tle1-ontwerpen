<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Requirement;
use App\Models\TimeSlot;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;
use Illuminate\Validation\ValidationException;
use Log;

class VacancyController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('can:create-vacancy', only: ['create', 'store']),
            new Middleware('can:manage-vacancy,vacancy', only: ['edit', 'update', 'delete', 'toggleActive']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('create-vacancy'))
        {
            $vacancies = Vacancy::where('branch_id', auth()->user()->branch_id)->get();
        }
        else {
            $vacancies = Vacancy::where('active', '=', '1')->get();
        }



        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $requirements = Requirement::all();
        $days = Day::all();

        return view('vacancies.create', ['requirements' => $requirements, 'days' => $days]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'branch' => ['required', 'numeric'],
            'description' => ['required'],
            'salaryMin' => ['required', 'min:0', 'numeric'],
            'salaryMax' => ['min:0', 'numeric', 'nullable'],
            'workHours' => ['min:0', 'numeric', 'nullable'],
            'contractDuration' => ['required', 'min:1', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,webp,gif,avif,apng', 'max:5000'],
            'imageAltText' => ['required', 'max:255']
        ]);

        //We are assuming the user hasn't fucked with the javascript so a day is always selected for every timeslot
        //They can deal with a 500 server error, they know why they got it
        $timeSlots = [];
        if ($request->days) {

            foreach ($request->days as $id => $day) {

                $timeSlots[$id]['day'] = $day;
                $timeSlots[$id]['startTime'] = $request->startTimes[$id] ?? null;
                $timeSlots[$id]['endTime'] = $request->endTimes[$id] ?? null;
                $timeSlots[$id]['optional'] = $request->optional[$id] ?? null;

            }

        }

        //Manually validate the timeslots
        foreach ($timeSlots as $timeSlot) {

            if (!$timeSlot['startTime']) {
                throw ValidationException::withMessages(['timeSlot' => 'Elk tijd slot heeft een start tijd nodig']);
            }

            if (!$timeSlot['endTime']) {
                throw ValidationException::withMessages(['timeSlot' => 'Elk tijd slot heeft een eind tijd nodig']);
            }

        }

        //Double check to make sure that the branch id matches the one linked to the current user (unless they are an admin)
        $branchId = $request->branch;
        if ($request->branch !== Auth::getUser()->branch_id && Auth::getUser()->role !== 42) {
            $branchId = Auth::getUser()->branch_id;
        }

        //Store the image in the correct folder and get a random filename
        $storagePath = public_path('storage/uploads/vacancyImages');
        $newName = Str::random(64) . '.' . $request->image->extension();

        //Clean the description before storing it to avoid any unsafe html
        $htmlSanitizer = new HtmlSanitizer(
            (new HtmlSanitizerConfig())->allowSafeElements()
        );

        $description = $htmlSanitizer->sanitize($request->description);

        $vacancy = Vacancy::create([
            'name' => $request->name,
            'branch_id' => $branchId,
            'description' => $description,
            'salary_min' => $request->salaryMin,
            'salary_max' => $request->salaryMax ?? null,
            'work_hours' => $request->workHours ?? null,
            'contract_duration' => $request->contractDuration,
            'image_file_path' => $newName,
            'image_alt_text' => $request->imageAltText
        ]);

        $request->image->move($storagePath, $newName);

        //Bind the selected requirements to the created vacancy if there are any
        $vacancy->requirements()->sync($request->requirements ?? []);

        //Add the time slots to the database if there are any
        if (!empty($timeSlots)) {

            foreach ($timeSlots as $timeSlot) {

                TimeSlot::create([
                    'day_id' => $timeSlot['day'],
                    'vacancy_id' => $vacancy->id,
                    'start_time' => $timeSlot['startTime'],
                    'end_time' => $timeSlot['endTime'],
                    'optional' => (bool)$timeSlot['optional']
                ]);

            }

        }

        return to_route('vacancies.show', $vacancy);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.details', ['vacancy' => $vacancy]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        $requirements = Requirement::all();
        $days = Day::all();

        return view('vacancies.edit', ['requirements' => $requirements, 'vacancy' => $vacancy, 'days' => $days]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'salaryMin' => ['required', 'min:0', 'numeric'],
            'salaryMax' => ['min:0', 'numeric', 'nullable'],
            'workHours' => ['min:0', 'numeric', 'nullable'],
            'contractDuration' => ['required', 'min:1', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif,avif,apng', 'max:5000'],
            'imageAltText' => ['required', 'max:255']
        ]);

        //We are assuming the user hasn't fucked with the javascript so a day is always selected for every timeslot
        //They can deal with a 500 server error, they know why they got it
        $timeSlots = [];
        if ($request->days) {

            foreach ($request->days as $id => $day) {

                $timeSlots[$id]['day'] = $day;
                $timeSlots[$id]['startTime'] = $request->startTimes[$id] ?? null;
                $timeSlots[$id]['endTime'] = $request->endTimes[$id] ?? null;
                $timeSlots[$id]['optional'] = $request->optional[$id] ?? null;

            }

        }

        //Manually validate the timeslots
        foreach ($timeSlots as $timeSlot) {

            if (!$timeSlot['startTime']) {
                throw ValidationException::withMessages(['timeSlot' => 'Elk tijd slot heeft een start tijd nodig']);
            }

            if (!$timeSlot['endTime']) {
                throw ValidationException::withMessages(['timeSlot' => 'Elk tijd slot heeft een eind tijd nodig']);
            }

        }

        //Store the image in the correct folder and get a random filename if one was uploaded
        if (isset($request->image)) {
            $storagePath = public_path('storage/uploads/vacancyImages');

            //Delete the old image
            $oldImage = $storagePath . '/' . $vacancy->image_file_path;
            unlink($oldImage);

            //Save the new one
            $newImage = $request->image;
            $newName = Str::random(64) . '.' . $request->image->extension();
            $newImage->move($storagePath, $newName);
        }

        //Clean the description before storing it to avoid any unsafe html
        $htmlSanitizer = new HtmlSanitizer(
            (new HtmlSanitizerConfig())->allowSafeElements()
        );

        $description = $htmlSanitizer->sanitize($request->description);

        $vacancy->name = $request->name;
        $vacancy->description = $description;
        $vacancy->salary_min = $request->salaryMin;
        $vacancy->salary_max = $request->salaryMax ?? null;
        $vacancy->work_hours = $request->workHours ?? null;
        $vacancy->contract_duration = $request->contractDuration;
        $vacancy->image_file_path = $newName ?? $vacancy->image_file_path;
        $vacancy->image_alt_text = $request->imageAltText;

        $vacancy->update();

        //Detach and/or attach the relevant requirements
        $vacancy->requirements()->sync($request->requirements ?? []);

        if (!empty($timeSlots)) {
            //First, remove all existing time slots
            $existingTimeSlots = $vacancy->timeSlots;

            foreach ($existingTimeSlots as $existingTimeSlot) {
                $existingTimeSlot->delete();
            }

            //Then replace them with new ones
            //An employer can only edit the timeslots if there are no pending applications, so this is fine

            foreach ($timeSlots as $timeSlot) {

                TimeSlot::create([
                    'day_id' => $timeSlot['day'],
                    'vacancy_id' => $vacancy->id,
                    'start_time' => $timeSlot['startTime'],
                    'end_time' => $timeSlot['endTime'],
                    'optional' => (bool)$timeSlot['optional']
                ]);

            }

        }

        return to_route('vacancies.show', $vacancy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }

    public function toggleActive(Request $request, Vacancy $vacancy)
    {

        $request->validate([
           'vacancyId' => ['required']
        ]);

        if ($vacancy->active) {

            $vacancy->active = false;

        } else {

            $vacancy->active = true;

        }

        $vacancy->update();

        return to_route('vacancies.show', $vacancy);
    }

}
