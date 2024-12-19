<x-mail::message>
                <table style="width: 100%; background-color: #ffffff; border-radius: 15px; padding: 20px;">
                    <tr>
                        <td>
                            <!-- Email content -->
                            <h1 style="text-align: center;">U hebt succesvol gereageerd!</h1>
                            <h2>U heeft gereageerd op {{$vacancy}}</h2>
                            <p style="font-size: 16px; color: #333333;">
                                U staat nu op plek: (voorbeeld) in de wachtrij, veel succes!
                            </p>
                            <a class="button-pink" href="http://127.0.0.1:8000">Ga naar website</a>
                        </td>
                    </tr>
                </table>
</x-mail::message>
