@extends('layouts.app')
@section('content')
  <h1>Borrow Book</h1>
  <form method="POST" action="{{ route('borrows.store') }}">
    @csrf
    <div class="mb-2">
      <label>Book</label>
      <select name="book_id" class="form-select" required>
        <option value="">-- choose book --</option>
        @foreach($books as $book)
          <option value="{{ $book->id }}">{{ $book->title }} (available: {{ $book->copies - $book->active_borrows_count }})</option>
        @endforeach
      </select>
    </div>
    <div class="mb-2">
      <label>Member</label>
      <select name="member_id" class="form-select" required>
        <option value="">-- choose member --</option>
        @foreach($members as $m)
          <option value="{{ $m->id }}">{{ $m->member_number }} - {{ $m->lname }}, {{ $m->fname }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-2">
      <label>Due date (optional)</label>
      <input type="date" name="due_date" class="form-control">
    </div>
    <button class="btn btn-primary">Record Borrow</button>
  </form>
@endsection