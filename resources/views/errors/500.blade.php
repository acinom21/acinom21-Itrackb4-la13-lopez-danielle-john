@extends('layouts.app')

@section('content')
    <h1>Something went wrong</h1>
    <p>Sorry, the Library Portal ran into a problem. It has been written to the log, and we will look into it.</p>
    <a href="{{ route('books.index') }}">Back to the list</a>
@endsection