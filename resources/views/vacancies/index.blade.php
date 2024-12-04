<x-site-layout>
    @vite(['resources/css/vacanciesIndex.css'])

    <header>
    <h1>Open Vacatures</h1>
    </header>

    @if($vacancies->isNotEmpty())
            @foreach($vacancies as $vacancy)

                <div class="article">

                <div class="essentials">

                    <img src="{{ asset('storage/' . $vacancy->image_file_path) }}" alt="afbeelding van {{$vacancy->name}}">

                    <div class="column">

                        <h2>{{$vacancy->title}}</h2>
                        <ul>
                            <li>
                                @if($vacancy->salary_max)
                                    Salaris tussen: €{{$vacancy->salary_min}},- en €{{$vacancy->salary_max}},-
                                @else
                                    Minimum salaris: €{{$vacancy->salary_min}}
                                @endif
                            </li>
                            <li>{{$vacancy->work_hours}} werkuren</li>
                            <li>{{$vacancy->contract_duration}} maanden</li>
                        </ul>

                    </div>

                </div>

                    <div class="column">
                        <p>{{$vacancy->description}}</p>
                        <a href="{{ route('vacancies.show', $vacancy -> id) }}">Bekijk vacature</a>
                    </div>

                </div>

            @endforeach
    @else
        <p>Helaas, geen open vacatures</p>
    @endif

</x-site-layout>
