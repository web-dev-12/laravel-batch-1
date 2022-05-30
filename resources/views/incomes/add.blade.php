@extends('layout.master')
@section('title','Add Income Category')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Income Category</h4>
    </div>
    <div class="card-body">

        <div class="basic-form">
            <form method="post" action="{{route(currentUser().'.income.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="income_name" class="mb-1"><strong>Income Category</strong></label>
                    <input type="text" name="income_name" id="income_name" class="form-control">
                </div>          
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection