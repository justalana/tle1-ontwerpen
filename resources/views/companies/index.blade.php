@props(['companies' => ''])

<x-site-layout>

    @if(!empty($companies))

        <ul>
            @foreach($companies as $company)
                <li>{{ $company->name }}</li>
            @endforeach
        </ul>

    @endif


</x-site-layout>
