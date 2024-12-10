<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Haal alle vacatures op en voeg het aantal sollicitaties toe aan elke vacature
        $vacancies = Vacancy::all()->map(function ($vacancy) {
            $vacancy->application_count = $vacancy->applications()->count(); // Tel het aantal sollicitaties
            return $vacancy;
        });

        // Geef de vacatures en hun sollicitatieaantal door aan de view
        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Haal alle vereisten op voor de vacature
        $requirements = Requirement::all();

        // Toon de view voor het aanmaken van een vacature
        return view('vacancies.create', ['requirements' => $requirements]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de ingevoerde gegevens
        $request->validate([
            'name' => ['required', 'max:255'],
            'branch' => ['required', 'numeric'],
            'description' => ['required'],
            'salaryMin' => ['required', 'min:0', 'numeric'],
            'salaryMax' => ['min:0', 'numeric', 'nullable'],
            'workHours' => ['min:0', 'numeric', 'nullable'],
            'contractDuration' => ['required', 'min:1', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,webp,gif,avif,apng', 'max:5000'],
            'imageAltText' => ['required', 'max:255']
        ]);

        // Check de juiste branch voor de werkgever
        $branchId = $request->branch;
        if ($request->branch !== Auth::user()->branch_id && Auth::user()->role !== 'admin') {
            $branchId = Auth::user()->branch_id;
        }

        // Behandel de afbeelding
        $storagePath = public_path('storage/uploads/vacancyImages');
        $newName = Str::random(64) . '.' . $request->image->extension();

        // Maak de nieuwe vacature aan
        $vacancy = Vacancy::create([
            'name' => $request->name,
            'branch_id' => $branchId,
            'description' => $request->description,
            'salary_min' => $request->salaryMin,
            'salary_max' => $request->salaryMax ?? null,
            'work_hours' => $request->workHours ?? null,
            'contract_duration' => $request->contractDuration,
            'image_file_path' => $newName,
            'image_alt_text' => $request->imageAltText
        ]);

        // Sla de afbeelding op
        $request->image->move($storagePath, $newName);

        // Voeg vereisten toe aan de vacature
        if (isset($request->requirements)) {
            foreach ($request->requirements as $requirement) {
                $vacancy->requirements()->attach($requirement);
            }
        }

        return to_route('vacancies.show', $vacancy);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {

        $applicationCount = $vacancy->applications()->count();

        return view('vacancies.details', [
            'vacancy' => $vacancy,
            'applicationCount' => $applicationCount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
