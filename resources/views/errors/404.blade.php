@extends('layouts.app')

@section('content')
    <h1>Page not found</h1>
    <p>Sorry, that book or page doesn't exist in the Library Portal. Paumanhin, ang hinahanap mong libro ay kasalukuyang di magagamit sapagkat ginagamit na ito ng ibang manggagamit.   </p>
    <a href="{{ route('books.index') }}">Back to the list</a>
@endsection