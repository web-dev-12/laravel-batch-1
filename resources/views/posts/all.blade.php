@extends('layouts.master')
@section('content')
    @parent
    <div class="col-md-12">
        <h1>All Post</h1>
        <a href="{{ route("add.post") }}" class="btn btn-info">Add Post (Route)</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Blog Name</th>
                    <th scope="col">Blog Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$post->blogName}}</td>
                        <td>{{$post->blogDes}}</td>
                        <td>
                            <a href="{{route('edit.post',$post->id)}}">Edit</a>
                            <form action="{{route('delete.post',$post->id)}}" method="POST">
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
@endsection