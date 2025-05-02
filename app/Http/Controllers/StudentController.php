<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:20',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'city_id' => 'required|exists:cities,id'
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }

    public function update(Request $request, Student $student)
    {
    $validated = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:20',
        'email' => 'required|email|unique:students,email,'.$student->id,
        'date_of_birth' => 'required|date|before:today',
        'city_id' => 'required|exists:cities,id'
    ]);

    $student->update($validated);
    return redirect()->route('students.show', $student->id)
                   ->with('success', 'Student updated successfully.');
    }

    // public function update(Request $request, Student $student)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required',
    //         'phone' => 'required|max:20',
    //         'email' => 'required|email|unique:students,email,'.$student->id,
    //         'date_of_birth' => 'required|date',
    //         'city_id' => 'required|exists:cities,id'
    //     ]);

    //     $student->update($validated);
    //     return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    // }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}