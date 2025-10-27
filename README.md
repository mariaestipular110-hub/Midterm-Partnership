#  Library Management System (Laravel)

##  Project Title
**Library Management System using Laravel**

## Overview
The Library Management System is a web-based application built with Laravel that allows easy management of library resources. It helps librarians efficiently handle books, members, and borrowing transactions. The system automates record-keeping and updates book availability when borrowed or returned.

## Objectives

- To implement a full-featured CRUD-based library system in Laravel.
- To apply the Model–View–Controller (MVC) architecture effectively.
- To manage data relationships between books, members, and borrows.
- To ensure automatic updating of available book copies upon borrowing and returning.
- To create a simple, user-friendly interface using Bootstrap.
- Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Features / Functionalities

- Book Management – Add, edit, delete, and view book records with the number of copies.
- Member Management – Register and manage members who borrow books.
- Loan Management – Record book borrowing and returning transactions.
- Automatic Inventory Control 
    - When a book is borrowed → copies decrease by 1.
    - When a book is returned → copies increase by 1.
- Clean Bootstrap UI – Simple and responsive design for usability.

## Installation Instructions
1. Clone or Download the project folder.
2. Open the terminal and navigate to the project directory: "cd library-system".
3. Install dependencies: "composer install".
4. Copy .env.example to .env and configure your database.
5. Generate the application key: "php artisan key:generate"
6. Run migrations to create tables: "php artisan migrate"
7. Start the local development server using "php artisan serve".
8. Visit the app in your browser "http://127.0.0.1:8000/books".

### Usage
 **After installation, you can navigate through the system via the following pages:**
 | **Page** | **Description** |
|----------------|-----------------|
| **/books** |Displays all books with available copies. |
| **/books/create** |Add a new book. |
| **/members** | Manage library members. |
| **/borrows** | View all loan records (borrowed/returned books). |
| **/loans/create** | BBorrow a book. |

## Code of Conduct
- A Member has many Loans (1 → Many).
- A Book has many Loans (1 → Many).
- A Loan belongs to both a Book and a Member.
- Book copies are automatically decremented or incremented based on transactions.

## MVC Architecture 
The system follows Laravel's MVC (Model-View-Controller) structure:
 | **Component** | **Description** |
|----------------|-----------------|
| **Model** | Represents database tables: `Book`, `Member`, and `Borrow`. Each defines fillable fields and relationships. |
| **View** | Blade templates for displaying books, members, and borrow records using Bootstrap tables. |
| **Controller** | Business logic that handles data flow and validation (e.g., decrement/increment book copies). |

## Sreenshot or Code Snippets
## BOOKCONTROLLER
```php
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

## Contributors 
