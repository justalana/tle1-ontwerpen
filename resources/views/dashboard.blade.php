@vite(['resources/css/general.css'])

<x-site-layout title="Dashboard">

    <article id="dashboardContainer">

        <article id="dashboardProfileContainer">

            <h2>Profiel</h2>

            <div>
                <a href="{{ route('profile') }}">Ga naar jouw profiel</a>
            </div>

            @can('create-vacancy')

                <div>
                    <a href="{{ route('branches.show', Auth::user()->branch) }}">Ga naar jouw filiaal</a>
                </div>

            @endcan

        </article>

        @can('create-vacancy')

            <article>

                <h2>Vacatures</h2>

                <div>
                    <a href="{{ route('vacancies.private') }}">Bekijk jouw vacatures</a>
                </div>

            </article>

        @else

            <article>

                <h2>Reacties</h2>

                <div>
                    <a href="{{ route('applications.index') }}">Bekijk jouw applicaties</a>
                </div>

            </article>

        @endcan


    </article>


</x-site-layout>
