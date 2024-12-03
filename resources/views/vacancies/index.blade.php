<x-site-layout>
    <h1>Open Vacatures</h1>

    @if($vacancies->isNotEmpty())
        <div>
            @foreach($vacancies as $vacancy)
                <div>
                <h1>!voeg titel toe plz?</h1>
                <ul>
                    <li>Salaris tussen: -{{$vacancy->salary_min}} en -{{$vacancy->salary_max}}</li>
                    <li>{{$vacancy->work_hours}}</li>
                    <li>{{$vacancy->contract_duration}}</li>
                </ul>
                </div>
                <div>
                    <p>{{$vacancy->description}}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>Helaas, geen open vacatures</p>
    @endif
</x-site-layout>
