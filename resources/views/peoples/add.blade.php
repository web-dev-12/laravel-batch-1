@extends('layout.master')
@section('title','Add People')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add People</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="basic-form">
                                    <form method="post" action="{{route(currentUser().'.people.store')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="p_name" class="mb-1"><strong>Name</strong></label>
                                            <input type="text" name="p_name" id="p_name" class="form-control" value="{{old('p_name')}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="mb-1"><strong>Contact No</strong></label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="due_amount" class="mb-1"><strong>Due Amount</strong></label>
                                            <input type="text" name="due_amount" id="due_amount" class="form-control" value="{{old('due_amount')}}">
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                    <label for="type" class="form-label"><strong>Type</strong></label>
                                                    <select id="type" class="default-select form-control wide" name="type">
                                                        <option selected="">Choose...</option>
                                                        <option value="1">Debitors</option>
                                                        <option value="2">Creditors</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="note"><strong>Note || Address </strong></label>
                                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                            </div>
                                        </div>  
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

@push('scripts')
    <script>
    </script>
@endpush					
@endsection