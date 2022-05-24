@extends('layouts.master')
@section('title','Add Post')
@section('content')
    <h1>Add Post</h1>
    <form method="post" action="{{route('add.post')}}">
      @csrf
        <div class="mb-3">
            <label for="blogName" class="form-label">Blog Name</label>
            <input type="text" class="form-control" id="blogName" name="blogName">
        </div>
        <div class="mb-3">
            <label for="blogDes" class="form-label">Blog Description</label>
            <textarea class="form-control" id="blogDes" rows="10" name="blogDes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection