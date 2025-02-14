@vite(['resources/css/companies.css'])

<x-site-layout title="Create company">

    <h1>Create company</h1>

    <form action="{{ route('companies.store') }}" method="POST" id="companyForm">
        @csrf

        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" maxlength="255" required value="{{ old('name') ?? '' }}">
            @error('name')
            <p>{{ $errors->name }}</p>
            @enderror
        </div>

        <button type="submit">Submit</button>

    </form>


</x-site-layout>
