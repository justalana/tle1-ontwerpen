@props(['user'])
@vite(['resources/css/general.css'])

<x-site-layout title="Bewerk gebruiker">

    <h1>Bewerk {{ $user->name }}</h1>

    <form action="{{ route('admin.user-update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam*</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>

            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>

            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phoneNumber">Telefoon nummer (optioneel)</label>
            <input type="text" id="phoneNumber" name="phoneNumber" value="{{ $user->phone_number }}">

            @error('phoneNumber')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role">Rol</label>
            <select name="role" id="role" required>
                <option value="1" {{ $user->role === 1 ? 'selected' : ''}}>Werknemer</option>
                <option value="2" {{ $user->role === 2 ? 'selected' : ''}}>Werkgever</option>
                <option value="42" {{ $user->role === 42 ? 'selected' : ''}}>Admin</option>
            </select>

            @error('role')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <?php $branches = App\Models\Branch::all() ?>

        @if($branches->isNotEmpty())

            <div>
                <label for="branch">Selecteer filiaal</label>
                <select name="branch" id="branch">

                    <option value="" selected>Geen filiaal</option>

                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $user->branch_id === $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                    @endforeach

                </select>

                @error('branch')
                <p>{{ $message }}</p>
                @enderror
            </div>

        @else

            <p>Geen filialen gevonden! Maak een nieuwe aan</p>
            <a href="{{ route('branches.create') }}" class="button-light">Maak nieuw filiaal</a>

        @endif

        <button type="submit">Pas bewerkingen toe</button>

    </form>

</x-site-layout>
