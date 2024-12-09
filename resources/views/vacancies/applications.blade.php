@vite(['resources/css/vacancies.css'])
@props(['requirements'])
@props(['vacancy'])

<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <form action="{{ route('applications.store') }}" method="POST" id="vacancyForm">
        @csrf


        <p>Vink alle eisen aan waar je aan voldoet</p>

        <div id="checkboxContainer">

            @foreach($requirements as $requirement)
                <label> {{ $requirement->name }}
                    <input type="checkbox" name="requirements[]" value="{{ $requirement->id }}">
                </label>
            @endforeach

        </div>

    </form>
</x-site-layout>
