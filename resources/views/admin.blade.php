@vite(['resources/css/general.css'])

<x-site-layout title="Open Hiring Admin">

    <h1>Open Hiring admin page</h1>

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
