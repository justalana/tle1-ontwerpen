@props(['title' => 'Open Hiring'])
@vite(['resources/css/style.css'])

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
</head>
<body>

<nav>
    <a href="{{ route('home') }}"><img src="{{ asset('/images/logo.png') }}" alt="home"></a>
    <a href="{{ route('vacancies.index') }}">Vacatures</a>

    @guest
        <a href="">Over Open Hiring</a>
        <a href="">Contact</a>
    @endguest

    @can('create-vacancy')
        <a href="{{ route('vacancies.create') }}">Maak Vacature</a>
    @endcan

    @can('admin')
        <a href="{{ route('admin') }}">Admin</a>
    @else

        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @endauth

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

            <a href="{{ route('profile.edit') }}">Profiel</a>

            <p>|</p>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Log uit</button>
            </form>

        </div>
    @endauth

</nav>

<main>{{ $slot }}</main>

<footer class="footer">
    <div class="footer-section">
        <h3>Voor werkzoekenden</h3>
        <ul>
            <li>Vind een baan</li>
            <li>Veelgestelde vragen</li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Voor werkgevers</h3>
        <ul>
            <li>Spelregels</li>
            <li>Veelgestelde vragen</li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Over Open Hiring</h3>
        <ul>
            <li>Ontstaan</li>
            <li>Privacybeleid</li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Volg ons op</h3>
        <ul>
            <li>LinkedIn</li>
            <li>Instagram</li>
            <li>Facebook</li>
        </ul>
    </div>
</footer>

</body>
</html>
