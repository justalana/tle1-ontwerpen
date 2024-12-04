<x-site-layout title="Create vacancy">

    <h1>Create vacancy</h1>

    <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name*</label>
            <input type="text" id="name" name="name" maxlength="255" required value="{{ old('name') ?? '' }}">

            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

        @can('admin')

                <?php $branches = App\Models\Branch::all() ?>

            @if($branches->isNotEmpty())

                <div>
                    <label for="branch">Select branch*</label>
                    <select name="branch" id="branch" required>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach

                    </select>

                    @error('branch')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

            @else

                <p>No branches found! Please make one</p>
                <a href="{{ route('branches.create') }}" class="button-light">Create branch</a>

            @endif

        @else

            <input type="hidden" id="branch" name="branch" value="{{ Auth::getUser()->branch_id }}">

        @endcan

        <div>
            <label for="description">Description*</label>
            <textarea name="description" id="description"
                      cols="30" rows="10" required>{{ old('description') ?? '' }}</textarea>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaryMin">Minimum salary*</label>
            <input type="number" step="0.01" min="0.00" id="salaryMin" name="salaryMin" required
                   value="{{ old('salaryMin') ?? '' }}">

            @error('salaryMin')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaryMax">Maximum salary (optional, leave blank if you have a single salary)</label>
            <input type="number" step="0.01" min="0.00" id="salaryMax" name="salaryMax"
                   value="{{ old('salaryMax') ?? '' }}">

            @error('salaryMax')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="workHours">Work hours per week (optional, leave blank if hours are unknown)</label>
            <input type="number" step="1" min="0" id="workHours" name="workHours" value="{{ old('workHours') ?? '' }}">

            @error('workHours')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contractDuration">Duration of the contract in days*</label>
            <input type="number" step="1" min="1" id="contractDuration" name="contractDuration" required
                   value="{{ old('contractDuration') ?? '' }}">

            @error('contractDuration')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image">Upload image*</label>
            <input type="file" id="image" name="image" required>

            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="imageAltText">Describe the content of the image*</label>
            <input type="text" id="imageAltText" name="imageAltText" maxlength="255" required
                   value="{{ old('imageAltText') ?? '' }}">

            @error('imageAltText')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <p>* = required field</p>

        <button type="submit" class="button-light">Create vacancy</button>

    </form>

</x-site-layout>
