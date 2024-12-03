<x-site-layout>
    <header>
    <h1>Open Vacatures</h1>
    </header>
    <main>
    @if($vacancies->isNotEmpty())
            @foreach($vacancies as $vacancy)
                <div class="column, item">
                <div class="row">
                    <img src="{{ asset('storage/' . $vacancy->image_file_path) }}" alt="afbeelding van {{$vacancy->name}}">
                    <div class="column">
                        <h2>{{$vacancy->title}}</h2>
                        <ul>
                            <li>Salaris tussen: €{{$vacancy->salary_min}},- en €{{$vacancy->salary_max}},-</li>
                            <li>{{$vacancy->work_hours}} werkuren</li>
                            <li>{{$vacancy->contract_duration}} maanden</li>
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <p>{{$vacancy->description}}</p>
                    <a href="">Bekijk vacature</a>
                </div>
                </div>
            @endforeach
    @else
        <p>Helaas, geen open vacatures</p>
    @endif
    </main>
</x-site-layout>
