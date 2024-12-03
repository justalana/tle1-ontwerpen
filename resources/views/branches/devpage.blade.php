<x-site-layout title="Branch and company administration">

    <h1>Branch and company administration</h1>

    <section>

        <h2>Manage branches</h2>

        <a href="{{ route('branches.create') }}">Create branch</a>
        <a href="{{ route('branches.index') }}">See all branches</a>

    </section>

    <section>

        <h2>Manage companies</h2>

        <a href="{{ route('companies.create') }}">Create company</a>
        <a href="{{ route('companies.index') }}">See all companies</a>

    </section>

</x-site-layout>
