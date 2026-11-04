@extends('layouts.app')

@section('title', 'Book Details')

@section('content')

    <h2 class="mb-3">Book Details</h2>

    <div class="card mb-3" style="max-width: 420px;">
        <div class="card-header bg-primary text-white">
            Title: {{ $book->title }}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Genre: {{ $book->genre->name }}</li>
            <li class="list-group-item">Author: {{ $book->author }}</li>
            <li class="list-group-item">Year: {{ $book->year }}</li>
        </ul>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-primary">Edit</a>

        <form action="{{ route('books.destroy', $book) }}" method="POST"
              onsubmit="return confirm('Delete this book?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection