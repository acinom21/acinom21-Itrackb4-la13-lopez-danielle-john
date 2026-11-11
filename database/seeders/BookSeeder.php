<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Classical'  => Genre::create(['name' => 'Classical']),
            'Mystery'    => Genre::create(['name' => 'Mystery']),
            'Historical' => Genre::create(['name' => 'Historical']),
        ];

        $books = [
            ['MMK', 'charo santos', 1950, 'Classical', true],
            ['Spiderman', 'Lhorenz', 2011, 'Mystery', false],
            ['The Return of the King', 'Khaliq', 1954, 'Historical', true],
            ['World of Warcraft', 'Lenard', 2000, 'Historical', false],
            ['The Hobbit', 'Justin', 1954, 'Classical', false],
            ['The World of Computers', 'Mikko', 2010, 'Mystery', false],
            ['Programmer', 'Lhorenz', 1978, 'Historical', false],
            ['magpakailan man', 'jessica sojo', 2014, 'Classical', false],
            ['Noli Me Tangere', 'Jose Rizal', 1887, 'Classical', true],
            ['El Filibusterismo', 'Jose Rizal', 1891, 'Classical', false],
            ['Florante at Laura', 'Francisco Balagtas', 1838, 'Classical', false],
            ['Dekada 70', 'Lualhati Bautista', 1983, 'Historical', false],
            ['Ibong Adarna', 'Anonymous', 1900, 'Classical', false],
            ['The Silent Patient', 'Alex Michaelides', 2019, 'Mystery', true],
            ['Gone Girl', 'Gillian Flynn', 2012, 'Mystery', false],
            ['And Then There Were None', 'Agatha Christie', 1939, 'Mystery', false],
            ['The Name of the Rose', 'Umberto Eco', 1980, 'Historical', false],
            ['Wolf Hall', 'Hilary Mantel', 2009, 'Historical', false],
            ['The Book Thief', 'Markus Zusak', 2005, 'Historical', true],
            ['Murder on the Orient Express', 'Agatha Christie', 1934, 'Mystery', false],
            ['Pride and Prejudice', 'Jane Austen', 1813, 'Classical', false],
            ['Great Expectations', 'Charles Dickens', 1861, 'Classical', false],
        ];

        foreach ($books as [$title, $author, $year, $genre, $featured]) {
            Book::create([
                'title' => $title,
                'author' => $author,
                'year' => $year,
                'genre_id' => $genres[$genre]->id,
                'is_featured' => $featured,
                'description' => null,
            ]);
        }
    }
}   