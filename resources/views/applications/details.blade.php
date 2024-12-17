@vite(['resources/css/vacancies.css'])
@props(['requirements', 'vacancy', 'user', 'application', 'timeSlots'])
<x-site-layout title="Details {{ $vacancy->name }}">

    @can('show-application', $application)

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

{{--        <div id="checkboxContainer">--}}
{{--            <h2>Werkdagen die je hebt aangegeven:</h2>--}}

{{--            @if($timeSlots->isNotEmpty())--}}
{{--                <ul>--}}
{{--                    @foreach($timeSlots as $timeSlot)--}}
{{--                        <li>{{$timeSlot->day->name}} <br> {{$timeSlot->start_time}} t/m {{$timeSlot->end_time}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            @else--}}
{{--                <p>Je hebt geen eisen aangevinkt</p>--}}
{{--            @endif--}}

{{--        </div>--}}

    @endcan

</x-site-layout>
