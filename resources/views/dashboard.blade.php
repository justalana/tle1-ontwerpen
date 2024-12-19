@vite(['resources/css/general.css'])

<x-site-layout title="Dashboard">

    <h1>Dashboard</h1>

    <article id="dashboardContainer">

        <article>

            <h2>Profiel</h2>

            <div>
                <a class="button-pink" href="{{ route('profile') }}">Ga naar jouw profiel</a>
            </div>

            @can('create-vacancy')

                <div>
                    <a class="button-pink" href="{{ route('branches.show', Auth::user()->branch) }}">Ga naar jouw filiaal</a>
                </div>

            @endcan

        </article>

        @can('create-vacancy')

            <article>

                <h2>Vacatures</h2>

                <div>
                    <a class="button-pink" href="{{ route('vacancies.private') }}">Bekijk jouw vacatures</a>
                </div>

            </article>

        @else

            <article>

                <h2>Reacties</h2>

                <div>
                    <a class="button-pink" href="{{ route('applications.index') }}">Bekijk jouw reacties</a>
                </div>

            </article>

        @endcan


    </article>


</x-site-layout>
