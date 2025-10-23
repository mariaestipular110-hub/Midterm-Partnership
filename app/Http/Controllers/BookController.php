<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        
        $books = Book::withCount('activeBorrows')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'isbn'           => 'nullable|string|max:50',
            'title'          => 'required|string|max:255',
            'author'         => 'nullable|string|max:255',
            'publisher'      => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'copies'         => 'required|integer|min:1',
        ]);

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'isbn'           => 'nullable|string|max:50',
            'title'          => 'required|string|max:255',
            'author'         => 'nullable|string|max:255',
            'publisher'      => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'copies'         => 'required|integer|min:1',
        ]);

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
