<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('book.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request -> validate([
            'title'         => "required",
            'author'        => "required",
            "isbn"          => "required|unique:books",
            "cover"   => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
        ]);


        // upload student photo
        $fileName = time().'.'.$request->file('cover')->getClientOriginalExtension();
        $request->file('cover')->move(public_path('media/book'), $fileName);
        $path = $fileName;

        //data store
      DB::table('books') -> insert([
        "title"     => $request -> title,
        "author"    => $request -> author,
        "cover"     => $path,
        "isbn"      => $request -> isbn,
        "copy"      => $request -> copies,
        "available_copy" => $request-> copies,
        "created_at"    => now()
      ]);
        // return
        return back() -> with ("success", "Books created successful");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
