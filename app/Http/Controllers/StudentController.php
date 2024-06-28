<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $students = Student::all();
    return view('students.index', compact('students'));
}
// public function show($id)
// {
//     $student = Student::findOrFail($id);
//     return view('students.index', compact('student'));
// }
    public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'nim' => 'required|unique:students',
        'email' => 'required|email|unique:students',
        'phone' => 'required',
    ]);

    Student::create($request->all());
    return redirect('/students')->with('success', 'Student deleted successfully.');
}

public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'nim' => 'required|unique:students,nim,'.$id,
        'email' => 'required|email|unique:students,email,'.$id,
        'phone' => 'required',
    ]);

    $student = Student::findOrFail($id);
    $student->update($request->all());
    return redirect('/students')->with('success', 'Student deleted successfully.');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect('/students')->with('success', 'Student deleted successfully.');
}
}
