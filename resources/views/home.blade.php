@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="{{ asset('img/me.jpg') }}" width="96" height="96" class="rounded-circle" alt="Photo">
        <div>
            <strong>Danielle John T. Lopez</strong><br>
            BSInfoTech · 4 · A
        </div>
    </div>

    <h2>Find your next read in seconds</h2>
    <p>Browse, search and filter the library's books by genre, year and availability.</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary mb-4">Browse the books</a>

    <div class="row g-3" style="max-width: 420px;">
        <div class="col"><div class="card card-body text-center">
            <div class="fs-3">{{ $bookCount }}</div>Books in the library
        </div></div>
        <div class="col"><div class="card card-body text-center">
            <div class="fs-3">{{ $genreCount }}</div>Genres
        </div></div>
    </div>
@endsection