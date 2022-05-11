<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

use DB; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*===ORM===*/
       // $students = Student::all();
        /*===Query Builder select and join query====*/
        $students = DB::table('students')
                    ->join('student_classes','students.class_id','=','student_classes.id')
                    ->get();
        //dd($students);
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
        $request->validate(
            [
                'stuName'  => 'required',
                'fName'    => 'required',
                'mName'    => 'required',
                'email'    => 'required|unique:students',
                'mobile'   => 'unique:students',
                'class_id' => 'required',
                'image'    => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'stuName.required' => 'Student Name Can not be empty!',
            ]
        );
        $student = new Student();
        if($request->has('image')){
           // dd($request);
            $image = $request->file('image');
            $name = time().uniqid().'.'.$image->extension();
            $image->move('storage/app/students',$name);
            $student->image = $name;
        }
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
        $classes = StudentClass::all();
        return view('students.edit',compact('student_data','classes'));
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
        $student->class_id = $request->class_id;
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
