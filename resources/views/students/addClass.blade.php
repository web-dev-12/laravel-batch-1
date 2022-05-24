@extends('layouts.master')
@section('title','All Class Name')
@section('content')
    <h1>Add Class</h1>
    @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{ Session::get('msg') }}
        </p>
    @endif
        <form method="post" action="{{route('studentClass.store')}}">
            @csrf
            <div class="mb-3">
                <label for="className" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="className" name="className">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>    
@endsection