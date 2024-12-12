@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy'])

<x-site-layout title="Apply {{ $application->name }}">
    @auth
        <header>
            <div>
                <h1 id="details-header">{{$vacancy->name}}</h1>
            </div>
        </header>

        <form action="{{ route('applications.store', $vacancy->id) }}" method="POST" id="vacancyForm" onsubmit="return confirm('Weet je zeker dat je alles goed hebt ingevuld?');">
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
    @endauth

    @guest
        <h2>Je hebt geen toegang tot deze pagina</h2>
    @endguest

</x-site-layout>
