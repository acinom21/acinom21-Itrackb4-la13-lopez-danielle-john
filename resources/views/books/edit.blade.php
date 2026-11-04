@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')

    <h2 class="mb-3">Edit Book</h2>

    <form action="{{ route('books.update', $book) }}" method="POST" style="max-width: 420px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}"
                   class="form-control @error('title') is-invalid @enderror">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}"
                   class="form-control @error('author') is-invalid @enderror">
            @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" id="year" name="year" value="{{ old('year', $book->year) }}"
                   class="form-control @error('year') is-invalid @enderror">
            @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id"
                    class="form-select @error('genre_id') is-invalid @enderror">
                <option value="">-- Select a genre --</option>
                @foreach ($genres as $g)
                    <option value="{{ $g->id }}" @selected(old('genre_id', $book->genre_id) == $g->id)>
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection