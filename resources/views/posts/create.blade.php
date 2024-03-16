<html>

<head>
    <title>Add new post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    @extends('layouts.main')
    @section('title', 'All Posts')

    @section('content')

        <div class="container">
            <h4 class="my-4">Add new post</h4>
            <form class="w-25" action="{{ route('posts.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="published_at" class="form-label">Published at</label>
                    <input type="date" class="form-control" name="published_at" id="published_at"
                        value="{{ old('published_at') }}">
                    @error('published_at')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    {{-- <input type="text" class="form-control" name="user_id" id="user_id" value="{{ old('user_id') }}"> --}}
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea type="text" class="form-control" name="body" id="body">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="enabled" name="enabled" value="1">
                    <label class="form-check-label" for="enabled">Enabled</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
</body>

</html>
