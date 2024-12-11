@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy'])
<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <div id="checkboxContainer">
        <p>Eisen waaraan je voldoet</p>
        <ul>
            @foreach($requirements as $requirement)
                <li>{{$requirement->name}}</li>
            @endforeach
        </ul>

    </div>
</x-site-layout>
