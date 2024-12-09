<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
            new Middleware('can:manage-vacancy,vacancy', only: ['edit', 'update', 'delete']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 2 && \auth()->user()->branch_id)
        {
            $vacancies = Vacancy::where('branch_id', auth()->user()->branch_id)->get();
        }
        else {
            $vacancies = Vacancy::all();
        }


        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $requirements = Requirement::all();

        return view('vacancies.create', ['requirements' => $requirements]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        //Double check to make sure that the branch id matches the one linked to the current user (unless they are an admin)
        $branchId = $request->branch;
        if ($request->branch !== Auth::getUser()->branch_id && Auth::getUser()->role !== 42) {
            $branchId = Auth::getUser()->branch_id;
        }

        //Store the image in the correct folder and get a random filename
        $storagePath = public_path('storage/uploads/vacancyImages');
        $newName = Str::random(64) . '.' . $request->image->extension();

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

        $request->image->move($storagePath, $newName);

        //Bind the selected requirements to the created vacancy if there are any

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
        return view('vacancies.details', ['vacancy' => $vacancy]);
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
