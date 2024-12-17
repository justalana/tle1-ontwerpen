@vite(['resources/css/general.css'])

<x-site-layout>
    <header>
        <div>
            <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Werk voor wie wil werken</h1>
            <p>Met Open Hiring heeft iedereen een eerlijke kans op een baan. Wie wil én kan werken, kan zó aan de slag.
                Zonder sollicitatiegesprek, zonder brief, zonder vragen. Met één druk op de knop. Open Hiring draait
                namelijk niet om diploma’s, maar om mensen. Niet om praatjes, maar om aanpakken.</p>
        </div>
        <img src="{{ asset('images/homeHeaderImage.png') }}" alt="decorative image">
    </header>

    <section id="stories">
        <h2 role="heading" aria-level="2" aria-label="Subtitel">Hoe jouw verhaal het verschil maakt</h2>
        <div class="articles-div">
            <article class="werknemer">
                <b class="violet">WERKNEMER</b>
                <p>"Zonder sollicitatiegesprek is het makkelijker om aan het werk te gaan. Het is leuk, iedereen is
                    aardig. Ik heb het hier naar mijn zin."</p>
                <div class="author">
                    <b>Adela</b>
                    <p>Vulploegmedewerker</p>
                </div>
            </article>
            <article class="werkgever">
                <b class="violet">WERKGEVER</b>
                <p>“Je moet je vooroordelen en aannames kunnen loslaten, maar dan zul je vaak verrast worden door de
                    kwaliteit en de persoon zelf.”</p>
                <div class="author">
                    <b>Gaby Westelaken</b>
                    <p>GWS dé schoonmaker</p>
                </div>
            </article>
        </div>
        <div class="buttons">
            <a class="button-light" href="{{ route('vacancies.index') }}">Vind ook een baan</a>
            <a class="button-light">Een vacature plaatsen</a>
        </div>

    </section>
    <section id="jobs-preview">
        <h2 role="heading" aria-level="2" aria-label="Subtitel">Openstaande vacatures voor iedereen</h2>
        <p>Momenteel zijn er geen openstaande vacatures beschikbaar.</p>
        <a class="button-light" href="{{ route('vacancies.index') }}">Bekijk alle vacatures</a>
    </section>

</x-site-layout>
