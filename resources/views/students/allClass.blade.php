@extends('layouts.master')
@section('title','All Students')
@section('content')
<h1>All Student Class List</h1>
                <a href="{{ route('studentClass.create') }}" class="btn btn-info">Add Class</a>
               
                @if(Session::has('msg'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('msg') }}</p>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($classes as $class)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $class->className }}</td>
                                <td>
                                    <a href="{{route('studentClass.show', $class->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('studentClass.edit', $class->id)}}" class="btn btn-success">Edit</a>

                                    <form action="{{route('studentClass.destroy',$class->id)}}" method="POST">
                                    @method('DELETE')    
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
@endsection
