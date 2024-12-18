@props(['users'])
@vite(['resources/css/admin.css'])

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
                    <a class="table-link" href="{{ route('admin.user-edit', $user) }}">Bewerk {{ $user->name }}</a>
                </td>
            </tr>

        @endforeach

        </table>

        @if($users->links())

        <x-page-links :items="$users"></x-page-links>

        @endif


    </section>


</x-site-layout>
