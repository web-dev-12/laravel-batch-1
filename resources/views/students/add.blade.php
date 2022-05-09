@extends('layouts.master')
@section('title','Add Student')
@section('content')
<h1>Add Student</h1>
                @if(Session::has('msg'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('msg') }}</p>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('student.store')}}">
                  @csrf
                    <div class="mb-3">
                        <label for="stuName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="stuName" name="stuName">
                    </div>
                    @if($errors->has('stuName'))
                    {{$errors->first('stuName')}}
                    @endif
                    <div class="mb-3">
                        <label for="fName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fName" name="fName">
                    </div>
                    @error('fName')
                    {{$message}}
                    @enderror
                    <div class="mb-3">
                        <label for="mName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="mName" name="mName">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Select Class</label>
                        <select class="form-control" name="class_id">
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->className}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
@endsection
