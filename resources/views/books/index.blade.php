@extends('layouts.app')
@section('content')
  <h1>Books</h1>
  <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Add Book</a>

  <table class="table table-striped">
    <thead><tr><th>Title</th><th>Author</th><th>Copies</th><th>Active Borrowed</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($books as $b)
        <tr>
          <td>{{ $b->title }}</td>
          <td>{{ $b->author }}</td>
          <td>{{ $b->copies }}</td>
          <td>{{ $b->active_borrows_count }}</td>
          <td>
            <a class="btn btn-sm btn-secondary" href="{{ route('books.edit', $b) }}">Edit</a>
            <form style="display:inline" method="POST" action="{{ route('books.destroy', $b) }}">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection