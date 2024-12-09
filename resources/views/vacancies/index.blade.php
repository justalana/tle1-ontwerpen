@vite(['resources/css/vacanciesIndex.css'])

<x-site-layout>

    <header>
        @if(auth()->user()->role === 2)
            <h1>Uw Vacatures</h1>
        @else
            <h1>Open Vacatures</h1>
        @endif
    </header>

    @if($vacancies->isNotEmpty())

        @foreach($vacancies as $vacancy)

            <div class="article">

                <div class="essentials">

                    <div class="image-container">
                        <img src="{{ asset('storage/uploads/vacancyImages/' . $vacancy->image_file_path) }}"
                             alt="{{ $vacancy->image_alt_text }}">
                    </div>

                    <div class="column">

                        <h2>{{$vacancy->name}}</h2>

                        <ul>

                            @if($vacancy->salary_max)
                                <li>Salaris tussen: €{{ number_format((float)$vacancy->salary_min, 2) }},- en
                                    €{{ number_format((float)$vacancy->salary_max, 2) }},- euro per uur
                                </li>
                            @else
                                <li>Minimum salaris: €{{ number_format((float)$vacancy->salary_min, 2) }} euro per uur
                                </li>
                            @endif

                            @if($vacancy->work_hours)
                                <li>{{$vacancy->work_hours}} werkuren</li>
                            @else
                                <li>Werkuren niet bekend</li>
                            @endif

                            <li>{{$vacancy->contract_duration}} dagen</li>

                        </ul>

                    </div>

                </div>

                <div class="column">
                    <p>{{$vacancy->description}}</p>
                    <a class="button-pink" href="{{ route('vacancies.show', $vacancy->id) }}">Bekijk vacature</a>
                </div>

            </div>

        @endforeach

    @else
        <p>Helaas, geen open vacatures</p>
    @endif

</x-site-layout>
