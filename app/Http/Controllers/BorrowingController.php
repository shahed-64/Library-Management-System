<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

       $data =  DB::table('borrowings')
        -> join('students', 'borrowings.student_id', '=', 'students.id')
         -> join('books', 'borrowings.book_id', '=', 'books.id')
         -> select('borrowings.*', 'students.name', 'students.photo', 'books.title', 'books.cover')
        -> orderBy('return_date', 'asc')
        -> get();
        return view('borrowing.index', [
            'borrows'       => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('borrowing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('borrowings') -> insert([
            'student_id'    => $request -> student_idc,
            'book_id'       => $request -> book_id,
            'issue_date'    => now(),
            'return_date'   => $request -> return_date,
            'created_at'    => now(),
        ]);

      $books_data =  DB::table('books') -> where('id', $request -> book_id) ->first();
                     DB::table('books')
                      -> where('id', $request -> book_id)
                      -> update([
                        'available_copy'   => $books_data -> available_copy -1
                      ]);


        return back() -> with('success', "You have successfully assign a book" );
    }

    /**
     * Display the specified resource.
     */
    public function show(borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(borrowing $borrowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, borrowing $borrowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(borrowing $borrowing)
    {
        //
    }
       public function search(Request $request)
    {
        //

        $students = DB::table('students') -> get();
        return view('borrowing.search', [
                'students' => $students

        ]);

    }
        public function findStudent_back(){
                return redirect('borrow-search');
        }

    public function findStudent( Request $request ){

        $request = DB::table('students')
        -> where('student_id', $request -> search)
        ->orWhere('email', $request -> search)
        ->orWhere('phone', $request -> search)
        -> get();

        return view('borrowing.search',[
            'students' => $request
        ]);

    }

    public function bookAssign($id){

            $students =    DB::table('students')
                -> where('student_id', $id)
                ->first();

            $books =  DB::table('books')
                ->get();

            return view('borrowing.assign_book', [
                'student'   => $students,
                'book'      => $books
            ]);
    }

    public function bookReturned($id, $book_id){
        DB::table('borrowings')
        -> where("id", $id)
        -> update([
            "status" => "returned"
        ]);

         $books_data =  DB::table('books') -> where('id', $book_id) ->first();
                     DB::table('books')
                      -> where('id', $book_id)
                      -> update([
                        'available_copy'   => $books_data -> available_copy +1
                      ]);

        return back() -> with('success', "Status Updated Successful");
    }

        public function overDew($id){
        DB::table('borrowings')
        -> where("id", $id)
        -> update([
            "status" => "over dew"
        ]);
        return back() -> with('danger', "Book has been over dew !");
    }




}
