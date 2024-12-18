@vite(['resources/css/vacancies.css'])

<x-site-layout>

    <header>
        @can('create-vacancy', auth()->user())
            <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Uw Vacatures</h1>
        @else
            <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Open Vacatures</h1>
        @endcan
    </header>

    <section id="vacancies">
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
                                    <li>{{$vacancy->work_hours}} uur per week</li>
                                @else
                                    <li>Werkuren niet bekend</li>
                                @endif

                                    @if($vacancy->contract_duration > 364)
                                        <li>{{ round($vacancy->contract_duration / 356) }} Jaar</li>
                                    @elseif($vacancy->contract_duration > 30)
                                        <li>{{ round($vacancy->contract_duration / 30) }} maanden</li>
                                    @elseif($vacancy->contract_duration > 7)
                                        <li>{{ round($vacancy->contract_duration / 52) }} weken</li>
                                    @else
                                        <li>{{ $vacancy->contract_duration }} dagen</li>
                                    @endif

                            </ul>

                        </div>

                    </div>

                    <div class="column">
                        <p>{!! Str::limit($vacancy->description, 250, '...') !!}</p>
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
    </section>


</x-site-layout>
