<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

class BranchController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('can:admin', only: ['create', 'store', 'delete']),
            new Middleware('can:edit-branch,branch', only: ['edit', 'update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();

        return view('branches.index', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();

        return view('branches.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'streetName' => ['required', 'string', 'max:255'],
            'streetNumber' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255']
        ]);

        //Clean the description before storing it to avoid any unsafe html
        $htmlSanitizer = new HtmlSanitizer(
            (new HtmlSanitizerConfig())->allowSafeElements()
        );

        $description = $htmlSanitizer->sanitize($request->description);

        Branch::create([
            'name' => $request->name,
            'company_id' => $request->company,
            'description' => $description,
            'street_name' => $request->streetName,
            'street_number' => $request->streetNumber,
            'city' => $request->city
        ]);

        return to_route('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branches.show', ['branch' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', ['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'streetName' => ['required', 'string', 'max:255'],
            'streetNumber' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255']
        ]);

        //Clean the description before storing it to avoid any unsafe html
        $htmlSanitizer = new HtmlSanitizer(
            (new HtmlSanitizerConfig())->allowSafeElements()
        );

        $description = $htmlSanitizer->sanitize($request->description);

        $branch->name = $request->name;
        $branch->description = $description;
        $branch->street_name = $request->streetName;
        $branch->street_number = $request->streetNumber;
        $branch->city = $request->city;

        $branch->save();

        return to_route('branches.show', $branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
