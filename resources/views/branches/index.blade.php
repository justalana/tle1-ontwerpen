@props(['branches' => ''])

<x-site-layout title="Branch overview">

    <h1>Branch overview</h1>

    @if(!empty($branches))

        <div>

            @foreach($branches as $branch)

                <article>

                    <h2>{{ $branch->name }}</h2>

                    <a href="{{ route('branches.show', $branch) }}">Details</a>

                    @can('edit-branch', $branch)

                        <a href="{{ route('branches.edit', $branch) }}">Edit</a>

                    @endcan

                </article>

            @endforeach

        </div>

    @else

        <h2>No branches found</h2>

    @endif

</x-site-layout>
