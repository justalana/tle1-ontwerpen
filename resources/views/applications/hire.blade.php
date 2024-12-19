@vite(['resources/css/vacancies.css'])

<x-site-layout title="Hire for {{ $vacancy->name }}">

    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>
@if($application)
    <div class="article">
        <p>Wilt u iemand inhuren met de volgende vereisten?:</p>
        @if($vacancy->requirements->isNotEmpty())
            <ul>
                @foreach($vacancy->requirements as $requirement)
                    <li>{{$requirement->name}}</li>
                @endforeach
            </ul>
        @else
            <p>Geen eisen aangevinkt</p>
        @endif
        <p>En beschikbaar is op de volgende tijdsloten?:</p>
        @if($vacancy->timeSlots->isNotEmpty())
            @foreach($vacancy->timeSlots as $timeSlot)
                <li>{{$timeSlot->day->name}} <br> {{$timeSlot->start_time}} t/m {{$timeSlot->end_time}}</li>
            @endforeach
        @else
            <p>Geen tijdslot aangevinkt</p>
        @endif
    </div>

    <form action="{{route('applications.hireUpdate', [$application, 'accept'])}}" method="POST" id="vacancyForm">
        @csrf
        @method('PUT')

        <button>Accepteer</button>

    </form>
    <form action="{{route('applications.hireUpdate', [$application, 'decline'])}}" method="POST" id="vacancyForm">
        @csrf

        <button>Weiger</button>

    </form>
    @else
    <p>De wachtrij is leeg</p>
    @endif
</x-site-layout>
