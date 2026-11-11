@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">+ Add Book</a>

    <form method="GET" action="{{ route('books.index') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control" placeholder="Search title">
        </div>

        <div class="col-md-2">
            <select name="genre" class="form-select">
                <option value="">All genres</option>
                @foreach ($genres as $g)
                    <option value="{{ $g->id }}" @selected(request('genre') == $g->id)>{{ $g->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="featured" class="form-select">
                <option value="">Any</option>
                <option value="1" @selected(request('featured') === '1')>Featured</option>
                <option value="0" @selected(request('featured') === '0')>Not featured</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="title" @selected($sort === 'title')>Sort by title</option>
                <option value="year" @selected($sort === 'year')>Sort by year</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary">Apply</button>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <p class="text-muted">
        Total books: <strong>{{ $books->total() }}</strong>
    </p>

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        {{ $book->year }}
                        @if ($book->year >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.index', ['genre' => $book->genre_id, 'sort' => $sort]) }}">
                            {{ $book->genre->name }}
                        </a>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                  onsubmit="return confirm('Delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Books Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}

@endsection