@extends('layout.master')
@section('title','Add Wallet')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Expense Category</h4>
                            </div>
                            <div class="card-body">
                         
                                <div class="basic-form">
                                    <form method="post" action="{{route(currentUser().'.expense.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Expense Category Name</label>
                                                <input type="text" name="expense_cat" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">Add Expense</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					
@endsection