@props(['url'])
<header>
    <a href="{{ $url }}" style="display: inline-block;">
        {{ $slot }}
    </a>
</header>


