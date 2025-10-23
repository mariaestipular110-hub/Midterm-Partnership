@extends('layouts.app')
@section('content')
  <h1>Add Book</h1>
  <form method="POST" action="{{ route('books.store') }}">
    @csrf
    <div class="mb-2"><input class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required></div>
    <div class="mb-2"><input class="form-control" name="author" placeholder="Author" value="{{ old('author') }}"></div>
    <div class="mb-2"><input class="form-control" name="isbn" placeholder="ISBN" value="{{ old('isbn') }}"></div>
    <div class="mb-2"><input class="form-control" name="published_year" placeholder="Year" value="{{ old('published_year') }}"></div>
    <div class="mb-2"><input type="number" min="1" class="form-control" name="copies" placeholder="Copies" value="{{ old('copies',1) }}" required></div>
    <button class="btn btn-primary">Save</button>
  </form>
@endsection
