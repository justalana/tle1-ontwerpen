@vite(['resources/css/vacancies.css'])

<x-site-layout>
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->name}}</h1>
        </div>
    </header>

    <div id="detail-flexbox">
        <div class="vacancy-details-img">
            <img id="vacancy-image" src="{{asset('storage/uploads/vacancyImages/' . $vacancy->image_file_path)}}"
                 alt="{{ $vacancy->image_alt_text }}">
        </div>

        <div>
            <ul id="detail-list">
                <li>Werkuren: {{$vacancy->work_hours}} uur per week</li>
                @if($vacancy->contract_duration > 364)
                    <li>{{ round($vacancy->contract_duration / 356) }} Jaar</li>
                @elseif($vacancy->contract_duration > 30)
                    <li>{{ round($vacancy->contract_duration / 30) }} maanden</li>
                @elseif($vacancy->contract_duration > 7)
                    <li>{{ round($vacancy->contract_duration / 52) }} weken</li>
                @else
                    <li>{{ $vacancy->contract_duration }} dagen</li>
                @endif
                @if($vacancy->salary_max)
                    <li>Salaris tussen: €{{ number_format((float)$vacancy->salary_min, 2) }} en
                        €{{ number_format((float)$vacancy->salary_max, 2) }} euro per uur
                    </li>
                @else
                    <li>Minimum salaris: €{{ number_format((float)$vacancy->salary_min, 2) }} euro per uur</li>
                @endif
                @if($vacancy->application_count != 0)
                    <p>{{ $vacancy->application_count }} aanmeldingen</p>
                    @endif
            </ul>
        </div>

    </div>

    <div class="description">
        <p id="description-text">{!!$vacancy->description!!}</p>
    </div>

    <div id="timeSlotContainer">
        @foreach($vacancy->timeSlots as $timeSlot)

            <article class="timeSlotDetail">

                <h3>{{ $timeSlot->day->name }}</h3>

                <div>
                    <p>Start tijd: {{ $timeSlot->start_time }}</p>
                    <p>Eind tijd: {{ $timeSlot->end_time }}</p>
                </div>

                @if($timeSlot->optional)
                    <p class="note">Optioneel</p>
                @endif

            </article>

        @endforeach
    </div>

    <section id="edit-buttons">
        @can('manage-vacancy', $vacancy)

            <a class="button-pink" href="{{ route('vacancies.edit', $vacancy) }}">Bewerk vacature</a>

            <form action="{{ route('vacancies.toggle-active', $vacancy) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="vacancyId" id="vacancyId" value="{{ $vacancy->id }}">

                @if($vacancy->active)

                    <p class="note">Deze vacature is nu zichtbaar voor iedereen</p>
                    <button class="button-pink" type="submit">Maak onzichtbaar</button>

                @else

                    <p class="note">Deze vacature is nu onzichtbaar</p>
                    <button class="button-pink" type="submit">Maak zichtbaar</button>

                @endif
            </form>

        @else
            @auth
                <div class="button-container">
                    <a class="button-pink" href="{{ route('applications.create', $vacancy->id) }}">Schrijf je in!</a>
                </div>
            @endauth

            @guest
                <div>
                    <a class="button-pink" href="{{ route('login') }}">Log in om je in te schrijven!</a>
                </div>
            @endguest

        @endcan
    </section>

</x-site-layout>

