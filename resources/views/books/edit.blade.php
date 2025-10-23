<h1>Edit Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>ISBN:</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"><br><br>

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" required><br><br>

        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"><br><br>

        <label>Published Year:</label>
        <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}"><br><br>

        <label>Copies:</label>
        <input type="number" name="copies" value="{{ old('copies', $book->copies) }}" min="1" required><br><br>

        <button type="submit">Update Book</button>
    </form>