@props(['requirements'])
@vite(['resources/css/vacancies.css'])

<x-site-layout title="Maak nieuwe vacature aan">

    <h1>Maak nieuwe vacature aan</h1>

    <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data" id="vacancyForm">
        @csrf

        <div>
            <label for="name">Naam van de vacature*</label>
            <input type="text" id="name" name="name" maxlength="255" required value="{{ old('name') ?? '' }}">

            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

        @can('admin')

                <?php $branches = App\Models\Branch::all() ?>

            @if($branches->isNotEmpty())

                <div>
                    <label for="branch">Selecteer filiaal*</label>
                    <select name="branch" id="branch" required>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach

                    </select>

                    @error('branch')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

            @else

                <p>Geen filialen gevonden! Maak een nieuwe aan</p>
                <a href="{{ route('branches.create') }}" class="button-light">Maak nieuw filiaal</a>

            @endif

        @else

            <input type="hidden" id="branch" name="branch" value="{{ Auth::getUser()->branch_id }}">

        @endcan

        <div>
            <label for="description">Beschrijving*</label>
            <textarea name="description" id="description"
                      cols="30" rows="10" required>{{ old('description') ?? '' }}</textarea>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <p>Vink alle toepasselijke eisen aan</p>

        <div id="checkboxContainer">

            @foreach($requirements as $requirement)
                <label> {{ $requirement->name }}
                    <input type="checkbox" name="requirements[]" value="{{ $requirement->id }}">
                </label>
            @endforeach

        </div>

        <div>
            <label for="salaryMin">Minimum salaris*</label>
            <input type="number" step="0.01" min="0.00" id="salaryMin" name="salaryMin" required
                   value="{{ old('salaryMin') ?? '' }}">

            @error('salaryMin')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaryMax">Maximum salaris (optioneel, laat dit vak leeg als er maar 1 salaris is)</label>
            <input type="number" step="0.01" min="0.00" id="salaryMax" name="salaryMax"
                   value="{{ old('salaryMax') ?? '' }}">

            @error('salaryMax')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="workHours">Werkuren per week (optioneel, laat dit vak leeg als de uren nog onbekend zijn)</label>
            <input type="number" step="1" min="0" id="workHours" name="workHours" value="{{ old('workHours') ?? '' }}">

            @error('workHours')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contractDuration">Lengte van het contract in dagen*</label>
            <input type="number" step="1" min="1" id="contractDuration" name="contractDuration" required
                   value="{{ old('contractDuration') ?? '' }}">

            @error('contractDuration')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image">Upload afbeelding*</label>
            <input type="file" id="image" name="image" required>

            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="imageAltText">Omschrijf de inhoud van de afbeelding*</label>
            <input type="text" id="imageAltText" name="imageAltText" maxlength="255" required
                   value="{{ old('imageAltText') ?? '' }}">

            @error('imageAltText')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <p>* = vereist veld</p>

        <button type="submit" class="button-light">Maak vacature aan</button>

    </form>

</x-site-layout>