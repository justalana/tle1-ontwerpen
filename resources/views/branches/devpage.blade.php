<x-site-layout title="Branch dev page">

    <section>

        <h1>Branch CRUD</h1>

        <a href="{{ route('branches.create') }}">Create branch</a>
        <a href="{{ route('branches.index') }}">See all branches</a>

    </section>

    <section>

        <h1>Company CRUD</h1>

        <a href="{{ route('companies.create') }}">Create company</a>
        <a href="{{ route('companies.index') }}">See all companies</a>

    </section>

</x-site-layout>
