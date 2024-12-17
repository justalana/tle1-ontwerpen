<x-site-layout>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Open Hiring</title>
        @vite(['resources/css/about.css']) <!-- Je externe CSS bestand wordt hier ingeladen -->
    </head>
    <body>
    <div class="container">
        <div class="text-section">
            <h1>Iedereen kan meedoen</h1>
            <p>
                Iedereen een eerlijke kans op een baan. Daar draait het om bij Open Hiring.
                Het gaat er niet om of iemand een diploma, vlotte babbel of bakken ervaring heeft,
                maar of iemand <strong>wíl</strong> en kan werken. Bedrijven die mensen zoeken via Open Hiring houden
                dus geen sollicitatiegesprekken. Zo hebben vooroordelen geen kans. Werkzoekenden bepalen zelf of ze
                geschikt zijn voor een baan. Zo maken we de arbeidsmarkt eerlijk. En krijgen we mensen snel (weer) aan het werk.
            </p>
        </div>
        <div class="image-section">
            <img src="images/aboutus.jpg" alt="Open Hiring Foto">
        </div>
    </div>

    <div class="principles">
        <h1>3 principes: waar gelooft Open Hiring in?</h1>
        <div class="principle-items">
            <div class="principle">
                <h1>1</h1>
                <h3>Het werkt beter zonder (voor)oordelen</h3>
                <p>
                    Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten juist wel.
                    Dat maakt de arbeidsmarkt eerlijker.
                </p>
            </div>
            <div class="principle">
                <h1>2</h1>
                <h3>We vertrouwen elkaar</h3>
                <p>
                    Werkzoekenden kunnen zelf prima beoordelen of ze een baan aankunnen. Door daarop te vertrouwen,
                    in mensen te geloven, worden organisaties (veer)krachtiger en diverser.
                </p>
            </div>
            <div class="principle">
                <h1>3</h1>
                <h3>Groeien doe je samen</h3>
                <p>
                    Ieder mens heeft mooie en minder mooie kanten én momenten. Door elkaar te accepteren en te helpen,
                    wordt een team sterker en beter in staat van elkaar te leren.
                </p>
            </div>
        </div>
    </div>

    <div class="rules">
        <h1>Spelregels Open Hiring</h1>

        <div class="rule" onclick="toggleRule(this)">
            <h3>1. Open deur</h3>
            <p>Iedereen kan, via deze website, reageren op een baan. Ongeacht achtergrond en ervaring. De wil om te werken, daar draait het om. Werkgevers zetten de deur dus open voor iedereen en werkzoekenden bepalen zelf of ze geschikt zijn voor de baan.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>2. Geen vragen stellen</h3>
            <p>Open Hiring biedt banen zonder sollicitatiegesprek. Maar het gaat verder: werkgevers stellen sowieso geen vragen aan werkzoekenden. Ook als iemand langskomt voor een informatiemoment gaan werkgevers niet in op zaken zoals achtergrond en het arbeidsverleden van de werkzoekende. Iemands verleden doet er niet toe. Wat iemand nu wil bijdragen, daar draait het om.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>3. Open armen</h3>
            <p>Het hele bedrijf ontvangt elke nieuwe medewerker met open armen. Niet alleen de werkgever, maar het hele team is zonder oordelen. Zo krijgt een nieuwe collega een eerlijke kans. Het is belangrijk dat een bedrijf alle medewerkers goed informeert over Open Hiring en laat zien wat het is: een nieuwe manier om mensen de kans te geven op een betaalde baan. Op zo’n bedrijf kan iedereen trots zijn.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>4. De juiste volgorde</h3>
            <p>De volgorde van inschrijving op een baan is heilig. Bij aanmelding zien werkzoekenden meteen op welke plek op de wachtlijst ze staan. Werkgevers nemen als eerste contact op met degene die bovenaan staat en bieden hem/haar de baan aan. Pas als iemand afziet van de baan, niet reageert op een uitnodiging, of als er weer een nieuwe werkplek vrijkomt, benadert een werkgever de volgende werkzoekende op de lijst.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>5. Een 'gewoon' contract</h3>
            <p>Werkgevers bieden werknemers die via Open Hiring worden aangenomen een contract dat gangbaar is binnen het bedrijf. Werknemers krijgen ook vanaf dag één gewoon betaald. Het doel is om uiteindelijk, bij goed presteren, een vast contract te kunnen bieden. Net als elke andere werknemer dus.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>6. Iedereen dezelfde behandeling</h3>
            <p>Alle werknemers binnen het bedrijf krijgen een gelijke behandeling. Of je nu via Open Hiring binnenkomt of op een andere manier. Dat betekent dat werknemers allemaal dezelfde kans krijgen om zich te bewijzen, maar zich ook allemaal aan dezelfde regels en afspraken moeten houden. Blijkt een werknemer tijdens het dienstverband niet aan de eisen te voldoen, of past de baan toch niet helemaal? Dan kun je als werkgever ook weer afscheid nemen van iemand, met het idee dat de werknemer ergens anders beter op zijn/haar plek is.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>7. Aandacht voor iedereen</h3>
            <p>De focus ligt op werk. Maar er is ook aandacht voor persoonlijke omstandigheden die het goed presteren op de werkvloer in de weg staan. Iedereen loopt wel eens ergens tegenaan. Ook dan ben je er voor elkaar en zoek je samen naar een oplossing.</p>
        </div>

        <div class="rule" onclick="toggleRule(this)">
            <h3>8. Ontwikkelperspectief</h3>
            <p>Ontwikkeling van medewerkers is belangrijk binnen Open Hiring. Zowel op persoonlijk vlak als binnen het vakgebied. Werkgevers bieden werknemers de ondersteuning die ze nodig hebben én mogelijkheden om door te stromen naar andere functies, binnen het bedrijf of daarbuiten. De werknemer maakt daarin wel zijn of haar eigen keuzes.</p>
        </div>
    </div>

    <script>
        function toggleRule(rule) {
            rule.classList.toggle('active');
        }
    </script>
    </body>
    </html>
</x-site-layout>
