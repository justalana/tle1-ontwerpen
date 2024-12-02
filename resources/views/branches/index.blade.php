@props(['branches' => ''])

<x-site-layout>

    <h1>Branch index</h1>

    @if(!empty($branches))

        <div>

            @foreach($branches as $branch)

                <article>

                    <h2>{{ $branch->name }}</h2>

                    <a href="{{ route('branches.show', $branch) }}">Details</a>
                    <a href="{{ route('branches.edit', $branch) }}">Edit</a>

                </article>

            @endforeach

        </div>

    @endif

</x-site-layout>
