@props(['branches' => ''])

<x-site-layout>

    <h1>Branch index</h1>

    @if(!empty($branches))

        <ul>
            @foreach($branches as $branch)
                <li>{{ $branch->name }}</li>
            @endforeach
        </ul>

    @endif

</x-site-layout>
