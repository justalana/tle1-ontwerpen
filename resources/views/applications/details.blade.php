@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy', 'user', 'application'])
<x-site-layout>
    @auth
        @if($user->id === $application->user_id || auth()->user()->role === 2 || auth()->user()->role === 42)
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
        @else
            <h2>Je hebt geen toegang tot deze pagina</h2>
        @endif

    @endauth

    @guest
            <h2>Je hebt geen toegang tot deze pagina</h2>
    @endguest

</x-site-layout>
