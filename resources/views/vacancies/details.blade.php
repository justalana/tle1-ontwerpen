@vite(['resources/css/vacancies.css'])

<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <div id="detail-flexbox">
        <div>
            <img id="vacancy-image" src="{{asset('storage/uploads/vacancyImages/' . $vacancy->image_file_path)}}"
                 alt="{{ $vacancy->image_alt_text }}">
        </div>
        <div>
            <ul id="detail-list">
                <li>Werkuren: {{$vacancy->work_hours}} uur per week</li>
                <li>Contractduur: {{$vacancy->contract_duration}} dagen</li>
                @if($vacancy->salary_max)
                    <li>Salaris tussen: €{{ number_format((float)$vacancy->salary_min, 2) }} en
                        €{{ number_format((float)$vacancy->salary_max, 2) }} euro per uur
                    </li>
                @else
                    <li>Minimum salaris: €{{ number_format((float)$vacancy->salary_min, 2) }} euro per uur</li>
                @endif
            </ul>
        </div>
    </div>

    <div id="description">
        <p id="description-text">{!!$vacancy->description!!}</p>
    </div>

    @can('manage-vacancy', $vacancy)

        <div>
            <a class="button-pink" href="{{ route('vacancies.edit', $vacancy) }}">Bewerk vacature</a>
        </div>

    @else

        <div>
            <a class="button-pink" href="{{ route('applications.create', $vacancy->id) }}">Schrijf je in!</a>
        </div>

    @endcan

</x-site-layout>

