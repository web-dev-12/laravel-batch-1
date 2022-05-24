@extends('layouts.master')
@section('title','All Students')
@section('content')
<div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Mother Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $student_data->stuName }}</td>
                                <td>{{ $student_data->fName }}</td>
                                <td>{{ $student_data->mName }}</td>
                                <td>{{ $student_data->email }}</td>
                                <td>{{ $student_data->mobile }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
@endsection