@vite(['resources/css/vacancies.css'])

<x-site-layout>

    <header>
        <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Open Vacatures</h1>
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

                        <h2 role="heading" aria-level="2" aria-label="Subtitel">{{$vacancy->name}}</h2>

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
                    <p>{!! $vacancy->description !!}</p>
                    <a class="button-pink" href="{{ route('vacancies.show', $vacancy) }}">Bekijk vacature</a>

                    @can('manage-vacancy', $vacancy)

                        <a class="button-pink" href="{{ route('vacancies.edit', $vacancy) }}">Bewerk vacature</a>

                    @endcan

                </div>

            </div>

        @endforeach

    @else
        <p>Helaas, geen open vacatures</p>
    @endif

    @foreach ($vacancies as $vacancy)
        <div class="vacancy-item">
            <h2 role="heading" aria-level="2" aria-label="Subtitel">{{ $vacancy->name }}</h2>
            <p>Aantal sollicitaties: {{ $vacancy->application_count }}</p>
        </div>
    @endforeach


</x-site-layout>
