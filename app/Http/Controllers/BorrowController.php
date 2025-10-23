<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book','member')->latest()->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        
        $books = Book::where('copies', '>', 0)->get();
        $members = Member::all();

        return view('borrows.create', compact('books','members'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id'   => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'due_date'  => 'nullable|date',
        ]);

        $book = Book::findOrFail($data['book_id']);

        if ($book->copies <= 0) {
            return back()->withErrors(['book_id' => 'No copies available'])->withInput();
        }

        
        $borrow = Borrow::create([
            'book_id'     => $data['book_id'],
            'member_id'   => $data['member_id'],
            'borrowed_at' => now(),
            'due_date'    => $data['due_date'] ?? now()->addDays(14),
        ]);

       
        $book->decrement('copies');

        return redirect()->route('borrows.index')->with('success', 'Borrow recorded.');
    }

    public function update(Request $request, Borrow $borrow)
    {
        $borrow->returned_at = now();
        $borrow->save();

       
        $borrow->book->increment('copies');

        return redirect()->route('borrows.index')->with('success', 'Book returned.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success','Borrow removed.');
    }
}
