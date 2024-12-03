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
                <li>Salaris: {{$vacancy->salary_min}} t/m {{$vacancy->salary_max}} euro per uur</li>
            </ul>
        </div>
    </div>

    <div id="description">
        <p id="description-text">{!!$vacancy->description!!}</p>
    </div>

    <div>
        <a href="">
            <button class="button-light">Schrijf je in!</button>
        </a>
    </div>

</x-site-layout>

