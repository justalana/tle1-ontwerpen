@vite(['resources/css/contact.css'])
<x-site-layout title="Contact">
    <body>
    <!-- Container -->
    <div class="container">
        <!-- Contactgegevens -->
        <div class="content">
            <h1>Contact ons</h1>
            <p>
                Ga je starten met Open Hiring, ben je al begonnen of heb je een heel andere vraag?
                We helpen je graag verder. Hier vind je onze contactgegevens.
                <!-- Afbeelding -->
            <div class="image">
                <img src="images/contact.jpg" alt="Klokgebouw">
            </div>
            </p>
            <!-- Contactgegevens -->
            <h2>Contactgegevens</h2>
            <p><a href="tel:+31857603967">+31 (0)85 760 39 67</a></p>
            <p><a href="mailto:info@openhiring.nl">info@openhiring.nl</a></p>
            <!-- Bezoekgegevens -->
            <h2>Bezoekgegevens</h2>
            <p><strong>Klokgebouw 188, 7e etage</strong></p>
            <p>5617 AB, Eindhoven</p>

        </div>

        <!-- Contactformulier -->
        <div class="form">
            <h2>Stuur ons een bericht</h2>
            <form action="/contact" method="POST">
                <!-- Naam -->
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <!-- E-mail -->
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <!-- Onderwerp Dropdown -->
                <div class="form-group">
                    <label for="subject">Onderwerp</label>
                    <select id="subject" name="subject" required>
                        <option value="" disabled selected>Kies een onderwerp</option>
                        <option value="klacht">Klacht over werkgever</option>
                        <option value="algemeen">Algemene vraag</option>
                        <option value="technisch">Technisch probleem</option>
                        <option value="suggestie">Suggestie</option>
                    </select>
                </div>
                <!-- Bericht -->
                <div class="form-group">
                    <label for="message">Bericht</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <!-- Verzendknop -->
                <div class="form-group">
                    <button type="submit">Verstuur bericht</button>
                </div>
            </form>
        </div>


    </div>
    </body>
</x-site-layout>
