@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy'])

<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <form action="{{ route('applications.store', $vacancy->id) }}" method="POST" id="vacancyForm">
        @csrf

        <p>Vink alle eisen aan waar je aan voldoet</p>

        <div id="checkboxContainer">
            @foreach($requirements as $requirement)
                <label> {{ $requirement->name }}
                    <input type="checkbox" name="requirements[]" value="{{ $requirement->id }}">
                </label>
            @endforeach
        </div>

        <button type="submit" class="button-green">Bevestig aanmelding</button>
    </form>
</x-site-layout>
