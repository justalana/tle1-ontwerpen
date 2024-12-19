@props(['branch'])
@vite(['resources/css/branches.css'])


<x-site-layout title="{{ $branch->name }} details">

    <div id="branchDetailContainer">

        <div id="branchNameContainer">

            <h1>{{ $branch->name }}</h1>
            <p>{{ $branch->company->name }}</p>

        </div>

        <div id="branchDescription">{!! $branch->description !!}</div>

        <div id="branchDetailAdressContainer">

            <p>Adress:</p>
            <p>{{ $branch->street_name }} {{ $branch->street_number }}, {{ $branch->city }}</p>

        </div>

        @can('edit-branch', $branch)
            <div>
                <a class="button-pink" href="{{ route('branches.edit', $branch) }}">Bewerk filiaal</a>
            </div>
        @endcan

    </div>


</x-site-layout>
