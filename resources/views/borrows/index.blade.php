@extends('layouts.app')

@section('content')
  <h1>Borrowed Books</h1>
  <a class="btn btn-primary mb-2" href="{{ route('borrows.create') }}">Borrow Book</a>

  <table class="table">
    <thead>
      <tr>
        <th>Book</th>
        <th>Member</th>
        <th>Borrowed At</th>
        <th>Due Date</th>
        <th>Returned At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($borrows as $borrow)
        <tr>
          <td>{{ $borrow->book->title }}</td>
          <td>{{ $borrow->member->lname }}, {{ $borrow->member->fname }}</td>
          <td>{{ $borrow->borrowed_at }}</td>
          <td>{{ $borrow->due_date }}</td>
          <td>{{ $borrow->returned_at ?? '—' }}</td>
          <td>
            @if(!$borrow->returned_at)
              <form method="POST" action="{{ route('borrows.update', $borrow) }}">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-success" onclick="return confirm('Mark as returned?')">
                  Return
                </button>
              </form>
            @else
              <form method="POST" action="{{ route('borrows.destroy', $borrow) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">
                  Delete
                </button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

