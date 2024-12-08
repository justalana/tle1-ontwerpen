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
</head>
<body>
<nav>
    <a href="{{ '/'}}"><img src="images/logo.png" alt="home"></a>
    <a href="{{ route('vacancies.index') }}">Vacatures</a>
    <a>Over Open Hiring</a>
    <a>Contact</a>

    @guest
        <div>
            <a href="{{ route('login') }}">Log in</a>
            <p>|</p>
            <a href="{{ route('register') }}">Registreer</a>
        </div>
    @endguest

    @auth
        @if(auth()->user())
            <div>
                <a href="{{ route('profile.edit') }}">Profiel</a>
                <p>|</p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Log uit</button>
                </form>
            </div>
        @endif
    @endauth

</nav>

<main>{{ $slot }}</main>

<footer>
    <p>footer</p>
</footer>

</body>
</html>
