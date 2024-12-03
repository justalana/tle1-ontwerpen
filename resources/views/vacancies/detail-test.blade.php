{{--@props(['vacancies' => ''])--}}

    <div>
        @if(!empty($vacancies))
            @foreach ($vacancies as $vacancy)
                <h2>{{$vacancy->title}}</h2>
                <a href="{{ route('vacancies.show', $vacancy->id) }}">Details</a>
            @endforeach

        @else
            <p>no vacancies</p>
        @endif

    </div>

