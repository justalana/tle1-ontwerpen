@props(['branch'])
@vite(['resources/css/branches.css'])


<x-site-layout title="Edit {{ $branch->name }}">

    <h1>Edit {{ $branch->name }}</h1>

    <form action="{{ route('branches.update', $branch) }}" method="POST" id="branchForm">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $branch->name }}" maxlength="255"
                   required>
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <x-trix-input id="description" name="description" value="{!! old('description') ? old('description')->toTrixHtml() : $branch->description->toTrixHtml() !!}"></x-trix-input>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="streetName">Street name</label>
            <input type="text" name="streetName" id="streetName" value="{{ old('streetName') ?? $branch->street_name }}"
                   maxlength="255" required>
            @error('streetName')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="streetNumber">Street number</label>
            <input type="text" name="streetNumber" id="streetNumber"
                   value="{{ old('streetNumber') ?? $branch->street_number }}" maxlength="255" required>
            @error('streetNumber')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="city">City</label>
            <input type="text" name="city" id="city" value="{{ old('city') ?? $branch->city }}" maxlength="255"
                   required>
            @error('city')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Save changes</button>

    </form>

</x-site-layout>
