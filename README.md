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
1. Install the composer (git compose).
2. Clone or Download the project folder.
3. Open the terminal and navigate to the project directory"cd libraryApp".
4. Copy .env.example to .env and configure your database.
5. Start the development server.
6. Start the local development server using "php artisan serve".
7. Visit the app in your browser"http://127.0.0.1:8000/books".

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

## MVC Architecture Overview
The system follows Laravel's MVC (Model-View-Controller) structure:
 | **Component** | **Description** |
|----------------|-----------------|
| **Model** | Represents database tables: `Book`, `Member`, and `Borrow`. Each defines fillable fields and relationships. |
| **View** | Blade templates for displaying books, members, and borrow records using Bootstrap tables. |
| **Controller** | Business logic that handles data flow and validation (e.g., decrement/increment book copies). |

## Example Code Snippets

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
