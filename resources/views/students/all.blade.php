@extends('layouts.master')
@section('title','All Students')
@section('content')
                <h1>All Student</h1>
                <a href="{{ route('student.create') }}" class="btn btn-info">Add Student</a>
                {{--<a href="{{ url('student/create') }}" class="btn btn-info">Add Studnet</a>--}}
                @if(Session::has('msg'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('msg') }}</p>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Mother Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->stuName }}</td>
                                <td>{{ $student->fName }}</td>
                                <td>{{ $student->mName }}</td>
                                <td>
                                    {{-- $student->studentclass->className --}}<!--ORM One to One-->
                                    {{$student->className}}<!--Query Builder-->
                                </td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>
                                    <a href="{{route('student.show', $student->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('student.edit', $student->id)}}" class="btn btn-success">Edit</a>

                                    <form action="{{route('student.destroy',$student->id)}}" method="POST">
                                    @method('DELETE')    
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
             </div>
         </div>
     </div>   

@endsection