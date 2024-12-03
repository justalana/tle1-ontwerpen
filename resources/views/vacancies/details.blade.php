@props(['title' => 'Open Hiring'])

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/style.css'])
    @vite(['resources/css/details.css'])
</head>
<body>

<nav></nav>

<header>
    <div>
        <h1>{{$vacancy->title}}</h1>
    </div>
</header>

<main>
    <div id="detail-flexbox">
        <div id="detail-flex">
            <img id="vacancy-image" src="{{asset('images/' . $vacancy->image_file_path)}}" alt="{{ $vacancy->image_file_path }}">
        </div>
        <div id="detail-flex">
            <ul id="detail-list">
                <li>Werkuren: {{$vacancy->work_hours}} uur per week</li>
                <li>Contractduur: {{$vacancy->contract_duration}} dagen</li>
                <li>Salaris: {{$vacancy->salary_min}} t/m {{$vacancy->salary_max}} euro per uur</li>
            </ul>
        </div>
    </div>

    <div id="description">
        <p>{{$vacancy->description}}</p>
    </div>
</main>

<footer></footer>

</body>
</html>
