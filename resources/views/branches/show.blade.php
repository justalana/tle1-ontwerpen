@props(['branch'])
@vite(['resources/css/companiesAndBranches.css'])


<x-site-layout title="{{ $branch->name }} details">

    <div id="branchDetailContainer">

        <div id="branchNameContainer">

            <h1>{{ $branch->name }}</h1>
            <p>{{ $branch->company->name }}</p>

        </div>

        <div>
            <p>{{ $branch->description }}</p>
        </div>

        <div id="branchDetailAdressContainer">

            <p>Adress:</p>
            <p>{{ $branch->street_name }} {{ $branch->street_number }}, {{ $branch->city }}</p>

        </div>

    </div>

</x-site-layout>
