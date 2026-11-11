<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'bookCount'  => Book::count(),
            'genreCount' => Genre::count(),
        ]);
    }
}