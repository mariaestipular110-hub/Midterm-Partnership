<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;

Route::get('/', function(){ return redirect()->route('books.index'); });

Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('borrows', BorrowController::class)->only(['index','create','store','update','destroy']);
