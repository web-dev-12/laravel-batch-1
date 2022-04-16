@extends('layouts.master')
@section('title','Edit Students')
@section('content')
<h1>Edit Student</h1>
                <form method="post" action="{{route('student.update',$student_data->id)}}">
                @method('PUT')
                @csrf
                   
                    <div class="mb-3">
                        <label for="stuName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="stuName" name="stuName" value="{{$student_data->stuName}}">
                    </div>
                    <div class="mb-3">
                        <label for="fName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fName" name="fName" value="{{$student_data->fName}}">
                    </div>
                    <div class="mb-3">
                        <label for="mName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="mName" name="mName" value="{{$student_data->mName}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$student_data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{$student_data->mobile}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
@endsection