@props(['users'])
@vite(['resources/css/general.css'])

<x-site-layout title="Gebruiker overzicht">

    <h1>Gebruiker overzicht</h1>

    <section id="userContainer">

        <table id="userOverview">
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Telefoon nummer</th>
                <th>Filiaal naam</th>
                <th>Rol</th>
                <th>Bewerk</th>
            </tr>

        @foreach($users as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number ?? 'geen nummer' }}</td>
                <td>{{ $user->branch->name ?? 'geen filiaal' }}</td>
                <td>{{ $user->role }}</td>

                <td>
                    <a class="button-pink" href="{{ route('admin.user-edit', $user) }}">Bewerk {{ $user->name }}</a>
                </td>
            </tr>

        @endforeach

        </table>


    </section>


</x-site-layout>
