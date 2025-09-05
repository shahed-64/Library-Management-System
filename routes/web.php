<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::resource("/student", StudentController::class);
Route::resource("/book", BookController::class);
Route::resource("/borrow", BorrowingController::class);
Route::get("/borrow-search", [BorrowingController::class, "search"]) -> name("borrow.search");
Route::post("/student-search", [BorrowingController::class, "findStudent"]) -> name("borrow.students-search");
Route::get("/student-search", [BorrowingController::class, "findStudent_back"]) -> name("borrow.students-search");
Route::get("/book-assign-search/{id}", [BorrowingController::class, "bookAssign"]) -> name("borrow.students-assign");
Route::get("/borrow-return/{id}/{books}", [BorrowingController::class, "bookReturned"]) -> name("borrow.returned");
Route::get("/borrow-overdew/{id}", [BorrowingController::class, "overDew"]) -> name("borrow.overdew");

