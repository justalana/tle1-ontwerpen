@props(['branch'])

<x-site-layout>

    <h1>{{ $branch->name }}</h1>
    <p>{{ $branch->company->name }}</p>

    <p>{{ $branch->description }}</p>

    <div>
        <p>Adress:</p>
        <p>{{ $branch->street_name }} {{ $branch->street_number }}, {{ $branch->city }}</p>
    </div>

</x-site-layout>
