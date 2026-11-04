<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->query('genre');
        $year  = $request->query('year');

        $query = Book::withh('genre');

        if ($genre) {
            $query = $query->where('genre_id', $genre);
        }

        if ($year) {
            $query = $query->where('year', $year);
        }

        $books = $query->get();

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year'  => $year,
        ]);
    }

    public function create()
    {
        return view('books.create', [
            'genres' => Genre::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'author'   => 'required|string|max:255',
            'year'     => 'required|numeric|digits:4',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book = Book::create($validated + ['is_featured' => false]);

        Log::info('Book saved', [
            'id'    => $book->id,
            'title' => $book->title,
        ]);

        $total = Book::count();

        return redirect()->route('books.index')
            ->with('success', "Book added successfully. You now have {$total} books.");
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();

        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'author'   => 'required|string|max:255',
            'year'     => 'required|numeric|digits:4',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        // Part E: refuse to delete the last book in a genre
        abort_if($book->genre->books()->count() === 1, 403);

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted.');
    }

    public function feature()
    {
        return view('books.feature', [
            'book' => Book::with('genre')->where('is_featured', true)->firstOrFail(),
        ]);
    }

    public function redirectOldFilter(?string $genre = null)
    {
        return redirect()->route('books.index', $genre ? ['genre' => $genre] : []);
    }
}