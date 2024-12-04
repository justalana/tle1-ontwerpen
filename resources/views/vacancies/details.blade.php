<x-site-layout>
    @vite(['resources/css/details.css'])
    <header>
        <div>
            <h1 id="details-header">{{$vacancy->title}}</h1>
        </div>
    </header>

    <div id="detail-flexbox">
        <div>
            <img id="vacancy-image" src="{{asset('images/' . $vacancy->image_file_path)}}" alt="{{ $vacancy->image_file_path }}">
        </div>
        <div>
            <ul id="detail-list">
                <li>Werkuren: {{$vacancy->work_hours}} uur per week</li>
                <li>Contractduur: {{$vacancy->contract_duration}} dagen</li>
                @if($vacancy->salary_max)
                    <li>Salaris tussen: €{{$vacancy->salary_min}},- en €{{$vacancy->salary_max}},- euro per uur</li>
                @else
                    <li>Minimum salaris: €{{$vacancy->salary_min}} euro per uur</li>
                @endif
            </ul>
        </div>
    </div>

    <div id="description">
        <p id="description-text">{!!$vacancy->description!!}</p>
    </div>

    <div>
        <a class="button-light" href="">Schrijf je in!</a>
    </div>

</x-site-layout>

