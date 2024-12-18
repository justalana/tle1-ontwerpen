@vite(['resources/css/admin.css'])

<x-site-layout title="Open Hiring Admin">

    <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Open Hiring admin dashboard</h1>

    <div id="adminArticleContainer">

        <article>

            <h2 role="heading" aria-level="2" aria-label="Subtitel">Beheer filialen</h2>

            <a class="button-pink" href="{{ route('branches.create') }}">Maak een nieuw filiaal</a>
            <a class="button-pink" href="{{ route('branches.index') }}">Bekijk alle filialen</a>

        </article>

        <article>

            <h2 role="heading" aria-level="2" aria-label="Subtitel">Beheer bedrijven</h2>

            <a class="button-pink" href="{{ route('companies.create') }}">Maak een nieuw bedrijf</a>
            <a class="button-pink" href="{{ route('companies.index') }}">Bekijk alle bedrijven</a>

        </article>

        <article>

            <h2 role="heading" aria-level="2" aria-label="Subtitel">Beheer gebruikers</h2>

            <a class="button-pink" href="{{ route('admin.user-index') }}">Bekijk alle gebruikers</a>

        </article>

    </div>

</x-site-layout>
