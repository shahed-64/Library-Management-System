<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = DB::table('students') -> get();
       return view('student.index', [
        'students'  => $student,
       ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        // validate
        $request -> validate([
            'name'           => "required",
            'email'          => "required",
            "student_id"    => "required",
            "phone"          => "required",
            "photo"   => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
        ]);


        // upload student photo
        $fileName = time().'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('media/book'), $fileName);
        $path = $fileName;

        //data store
      DB::table('students') -> insert([
        "name"            => $request -> name,
        "email"           => $request -> email,
        "phone"           => $request -> phone, 
        "student_id"      => $request -> student_id, 
        "photo"           => $path,
        "created_at"      => now()
      ]);
        // return
         return back() -> with ("success", "Student created successful");
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
