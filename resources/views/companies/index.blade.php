@props(['companies' => ''])
@vite(['resources/css/companies.css'])

<x-site-layout title="Company overview">

    <h1>Company overview</h1>

    @if(!empty($companies))

        <ul>
            @foreach($companies as $company)
                <li>{{ $company->name }}</li>
            @endforeach
        </ul>

    @else

        <h2>No companies found</h2>

    @endif


</x-site-layout>
