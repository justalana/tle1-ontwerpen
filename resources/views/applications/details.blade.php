@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy'])
<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <div id="checkboxContainer">
        <h2>Eisen waaraan je voldoet:</h2>
        @if($requirements->isNotEmpty())
            <ul>
                @foreach($requirements as $requirement)
                    <li>{{$requirement->name}}</li>
                @endforeach
            </ul>
        @else
            <p>Je hebt geen eisen aangevinkt</p>
        @endif

    </div>
</x-site-layout>
