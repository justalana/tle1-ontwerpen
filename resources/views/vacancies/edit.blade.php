@props(['requirements', 'vacancy', 'days'])
@vite(['resources/css/vacancies.css', 'resources/js/vacancyTimeSlotManager.js'])

@php

    //Store all the old data in an array
    $old = [];

    //We are assuming the user hasn't fucked with the javascript so a day is always selected for every timeslot
    if (old('days')) {

        foreach (old('days') as $id => $day) {

            $old[$id]['day'] = $day;
            $old[$id]['startTime'] = old('startTimes')[$id];
            $old[$id]['endTime'] = old('endTimes')[$id];
            $old[$id]['optional'] = old('optional')[$id] ?? null;

        }

    } else {

        foreach ($vacancy->timeSlots as $id => $timeSlot) {

            $old[$id]['day'] = $timeSlot->day->id;
            $old[$id]['startTime'] = $timeSlot->start_time;
            $old[$id]['endTime'] = $timeSlot->end_time;
            $old[$id]['optional'] = $timeSlot->optional;

        }

    }

    //Json encode the array so javascript can use it as an object
    $old = json_encode($old);

@endphp

<script>window.old = JSON.parse('{!! $old !!}')</script>

<x-site-layout title="Bewerk vacature">

    <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Bewerk vacature</h1>

    <form action="{{ route('vacancies.update', $vacancy) }}" method="POST" enctype="multipart/form-data"
          id="vacancyForm">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam van de vacature*</label>
            <input type="text" id="name" name="name" maxlength="50" required
                   value="{{ old('name') ?? $vacancy->name }}">

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
                            @php

                                $selected = false;

                                if (old('branch')) {

                                    if (old('branch') === strval($branch->id)) {
                                        $selected = true;
                                    }

                                } else {

                                    if ($vacancy->branch_id === $branch->id) {
                                        $selected = true;
                                    }

                                }

                            @endphp

                            <option value="{{ $branch->id }}" {{ $selected ? 'selected' : '' }}>{{ $branch->name }}</option>
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
            <x-trix-input id="description" name="description"
                          value="{!! old('description') ? old('description')->toTrixHtml() : $vacancy->description->toTrixHtml() !!}"></x-trix-input>

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
                    <input type="checkbox" name="requirements[]"
                           value="{{ $requirement->id }}" {{ $selectedRequirements->contains($requirement->id) ? 'checked' : '' }}>
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
            <label for="workHours">Werkuren per week (optioneel, laat dit vak leeg als de uren nog onbekend
                zijn)</label>
            <input type="number" step="1" min="0" id="workHours" name="workHours"
                   value="{{ old('workHours') ?? $vacancy->work_hours ?? '' }}">

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

        @if($vacancy->applications->where('status', '=', 1)->isEmpty())

        <div id="timeSlotContainer">

            <article class="timeSlot" id="timeSlot0" style="display: none">

                <div class="timeSlotTitleContainer">
                    <h3>Tijd slot 0</h3>
                    <button class="deleteTimeSlot" id="deleteTimeSlot0">- Verwijder</button>
                </div>

                <div>

                    <label for="days[0]">Selecteer een dag*</label>
                    <select name="days[0]" id="days[0]" required>
                        @foreach($days as $day)

                            <option value="{{ $day->id }}">{{ $day->name }}</option>

                        @endforeach
                    </select>

                </div>

                <div>
                    <label for="startTimes[0]">Start tijd*</label>
                    <input type="time" name="startTimes[0]" id="startTimes[0]" required>
                </div>

                <div>
                    <label for="endTimes[0]">Eind tijd*</label>
                    <input type="time" name="endTimes[0]" id="endTimes[0]" required>
                </div>

                <div class="timeSlotCheckboxContainer">
                    <label for="optional[0]">Optioneel</label>
                    <input type="checkbox" name="optional[0]" id="optional[0]">
                </div>

            </article>

        </div>

        @error('timeSlot')
        <p>{{ $message }}</p>
        @enderror

        <button id="addTimeSlot">+ Voeg een nieuw tijd slot toe</button>

        @else

            <p>Tijd slots mogen niet worden aangepast omdat er nog reacties in behandeling zijn op deze vacature.</p>

        @endif

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
