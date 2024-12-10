@props(['requirements', 'vacancy', 'days'])
@vite(['resources/css/vacancies.css', 'resources/js/vacancyTimeSlotManager.js'])

<x-site-layout title="Bewerk vacature">

    <h1>Bewerk vacature</h1>

    <form action="{{ route('vacancies.update', $vacancy) }}" method="POST" enctype="multipart/form-data" id="vacancyForm">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam van de vacature*</label>
            <input type="text" id="name" name="name" maxlength="50" required value="{{ old('name') ?? $vacancy->name }}">

            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Beschrijving*</label>
            <x-trix-input id="description" name="description" value="{!! old('description') ? old('description')->toTrixHtml() : $vacancy->description->toTrixHtml() !!}"></x-trix-input>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <p>Vink alle toepasselijke eisen aan</p>

        <div id="checkboxContainer">

            @php
                $selectedRequirements = old('requirements') ? collect(old('requirements')) : $vacancy->requirements ?? collect([]);
            @endphp

            @foreach($requirements as $requirement)
                <label> {{ $requirement->name }}
                    <input type="checkbox" name="requirements[]" value="{{ $requirement->id }}" {{ $selectedRequirements->contains($requirement->id) ? 'checked' : '' }}>
                </label>
            @endforeach

        </div>

        <div>
            <label for="salaryMin">Minimum salaris*</label>
            <input type="number" step="0.01" min="0.00" id="salaryMin" name="salaryMin" required
                   value="{{ old('salaryMin') ?? $vacancy->salary_min }}">

            @error('salaryMin')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaryMax">Maximum salaris (optioneel, laat dit vak leeg als er maar 1 salaris is)</label>
            <input type="number" step="0.01" min="0.00" id="salaryMax" name="salaryMax"
                   value="{{ old('salaryMax') ?? $vacancy->salary_max ?? '' }}">

            @error('salaryMax')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="workHours">Werkuren per week (optioneel, laat dit vak leeg als de uren nog onbekend zijn)</label>
            <input type="number" step="1" min="0" id="workHours" name="workHours" value="{{ old('workHours') ?? $vacancy->work_hours ?? '' }}">

            @error('workHours')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contractDuration">Lengte van het contract in dagen*</label>
            <input type="number" step="1" min="1" id="contractDuration" name="contractDuration" required
                   value="{{ old('contractDuration') ?? $vacancy->contract_duration }}">

            @error('contractDuration')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image">Upload afbeelding (Afbeelding wordt alleen veranderd als je een nieuwe upload)</label>
            <input type="file" id="image" name="image">

            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="imageAltText">Omschrijf de inhoud van de afbeelding*</label>
            <input type="text" id="imageAltText" name="imageAltText" maxlength="255" required
                   value="{{ old('imageAltText') ?? $vacancy->image_alt_text }}">

            @error('imageAltText')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <p>* = vereist veld</p>

        <button type="submit" class="button-light">Sla bewerkingen op</button>

    </form>

</x-site-layout>
