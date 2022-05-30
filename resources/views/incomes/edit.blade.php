@extends('layout.master')
@section('title','Edit Income Category')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Income Category</h4>
    </div>
    <div class="card-body">

        <div class="basic-form">
            <form method="post" action="{{route(currentUser().'.income.update',$single_income->id)}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="income_name" class="mb-1"><strong>Income Category</strong></label>
                    <input type="text" name="income_name" id="income_name" class="form-control" value="{{$single_income->income_name}}">
                </div>          
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection