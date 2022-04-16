<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.all',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = StudentClass::all();
        return view('students.add',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->stuName = $request->stuName;
        $student->fName = $request->fName;
        $student->mName = $request->mName;
        $student->email = $request->email;
        $student->mobile = $request->mobile;
        $student->class_id = $request->class_id;
        $student->save();
        return redirect(route('student.index'))->with('msg','Student Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_data = Student::find($id);
        return view('students.single',compact('student_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_data = Student::find($id);
        return view('students.edit',compact('student_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->stuName = $request->stuName;
        $student->fName = $request->fName;
        $student->mName = $request->mName;
        $student->email = $request->email;
        $student->mobile = $request->mobile;
        $student->save();
        return redirect(route('student.index'))->with('msg','Student Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect(route('student.index'))->with('msg','Student Data Deleted Successfully');
    }
}
