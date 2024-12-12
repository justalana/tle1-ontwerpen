@props(['title' => 'Open Hiring'])

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <title>{{ $title }}</title>
    @vite(['resources/css/style.css'])
</head>
<body>

<nav>
    <a href="{{ route('home') }}"><img src="{{ asset('/images/logo.png') }}" alt="home"></a>
    <a href="{{ route('vacancies.index') }}">Vacatures</a>
    <a href="">Over Open Hiring</a>
    <a href="">Contact</a>

    @can('admin')
        <a href="{{ route('admin') }}">Admin</a>
    @endcan

    @guest
        <div>
            <a href="{{ route('login') }}">Log in</a>
            <p>|</p>
            <a href="{{ route('register') }}">Registreer</a>
        </div>
    @endguest

    @auth
        <div>
            @if (auth()->user()->role === 2) <!-- Controleer of de gebruiker een werkgever is -->
            <a href="{{ route('employee') }}">Profiel</a>
            @else
                <a href="{{ route('profile.edit') }}">Profiel</a> <!-- Normaal profiel bewerken voor andere gebruikers -->
            @endif

            <p>|</p>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Log uit</button>
            </form>
        </div>
    @endauth

</nav>

<main>{{ $slot }}</main>

<footer>
    <p>footer</p>
</footer>

</body>
</html>
