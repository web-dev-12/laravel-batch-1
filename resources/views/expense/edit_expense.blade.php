@extends('layout.master')
@section('title',' Edit Expense')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Expense Category</h4>
                            </div>
                            <div class="card-body">
                         
                                <div class="basic-form">
                                    <form method="post" action="{{route(currentUser().'.expense.update',$edit_expense->id)}}">
                                    @method('PUT')  
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Expense Category Name</label>
                                                <input type="text" name="expense_cat" class="form-control" value = "{{$edit_expense->expense_cat}}">
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">Add Expense</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					
@endsection