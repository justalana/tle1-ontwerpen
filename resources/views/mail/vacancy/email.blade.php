<x-mail::message>
    <table style="width: 100%; background-color: #ffffff; border-radius: 15px; padding: 20px;">
        <tr>
            <td>
                <!-- Email content -->
                <h1 style="text-align: center;">Uw sollicitatie voor {{$vacancy->name}} is bekeken</h1>
                <h2>U bent {{$status}}</h2>
                <p style="font-size: 16px; color: #333333;">
                    veel succes met uw nieuwe werkplek
                </p>
                <a class="button-pink" href="http://127.0.0.1:8000">Ga naar website</a>
            </td>
        </tr>
    </table>
</x-mail::message>
