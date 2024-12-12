@vite(['resources/css/general.css'])

<x-site-layout title="Open Hiring Admin">

    <h1>Open Hiring admin dashboard</h1>

    <div id="adminArticleContainer">

        <article>

            <h2>Beheer filialen</h2>

            <a class="button-pink" href="{{ route('branches.create') }}">Maak een nieuw filiaal</a>
            <a class="button-pink" href="{{ route('branches.index') }}">Bekijk alle filialen</a>

        </article>

        <article>

            <h2>Beheer bedrijven</h2>

            <a class="button-pink" href="{{ route('companies.create') }}">Maak een nieuw bedrijf</a>
            <a class="button-pink" href="{{ route('companies.index') }}">Bekijk alle bedrijven</a>

        </article>

        <article>

            <h2>Beheer gebruikers</h2>

            <a class="button-pink" href="{{ route('admin.user-index') }}">Bekijk alle gebruikers</a>

        </article>

    </div>

</x-site-layout>
