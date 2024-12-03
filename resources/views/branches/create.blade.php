@props(['companies' => ''])

<x-site-layout title="Create branch">

    <h1>Create branch</h1>

    @if(empty($companies))

        <p>There are no companies yet! Go make one</p>
        <a href="{{ route('companies.create') }}">Create company</a>

    @else

        <form action="{{ route('branches.store') }}" method="POST">
            @csrf

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? '' }}" maxlength="255" required>
                @error('name')
                <p>{{$errors->name}}</p>
                @enderror
            </div>

            <div>
                <label for="company">Company</label>
                <select name="company" id="company" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{ old('description') ?? '' }}</textarea>
                @error('description')
                <p>{{$errors->description}}</p>
                @enderror
            </div>

            <div>
                <label for="streetName">Street name</label>
                <input type="text" name="streetName" id="streetName" value="{{ old('streetName') ?? '' }}" maxlength="255" required>
                @error('streetName')
                <p>{{$errors->streetName}}</p>
                @enderror
            </div>

            <div>
                <label for="streetNumber">Street number</label>
                <input type="text" name="streetNumber" id="streetNumber" value="{{ old('streetNumber') ?? '' }}" maxlength="255" required>
                @error('streetNumber')
                <p>{{$errors->streetNumber}}</p>
                @enderror
            </div>

            <div>
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="{{ old('city') ?? '' }}" maxlength="255" required>
                @error('city')
                <p>{{$errors->city}}</p>
                @enderror
            </div>

            <button type="submit">Submit</button>

        </form>

    @endif

</x-site-layout>
