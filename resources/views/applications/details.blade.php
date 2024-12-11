@vite(['resources/css/vacancies.css'])
@props(['requirements'])
<x-site-layout>
    <div id="checkboxContainer">
        <ul>
            @foreach($requirements as $requirement)
                <li>{{$requirement->name}}</li>
            @endforeach
        </ul>

    </div>
</x-site-layout>
