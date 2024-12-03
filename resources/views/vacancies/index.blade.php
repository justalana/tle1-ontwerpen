<x-site-layout>
    <h1>Open Vacatures</h1>

    @if($vacancies->isNotEmpty())
        <div>
            @foreach($vacancies as $vacancy)
                <h1>!voeg titel toe plz?</h1>
                <ul>
                    <li>Salaris tussen: -{{$vacancy->salary_min}} en -{{$vacancy->salary_max}}</li>
                    <li>{{$vacancy->work_hours}}</li>
                    <li>{{$vacancy->}}</li>
                </ul>
            @endforeach
        </div>
    @else
        <p>Helaas, geen open vacatures</p>
    @endif
</x-site-layout>
