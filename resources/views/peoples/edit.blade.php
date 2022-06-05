@extends('layout.master')
@section('title','Edit People')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit People</h4>
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
                                    <form method="post" action="{{route(currentUser().'.people.update', $people->id)}}">
                                        @method('PUT')    
                                        @csrf
                                        <div class="mb-3">
                                            <label for="p_name" class="mb-1"><strong>Name</strong></label>
                                            <input type="text" name="p_name" id="p_name" class="form-control" value="{{$people->p_name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="mb-1"><strong>Contact No</strong></label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{$people->phone}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="initial_amount" class="mb-1"><strong>Due Amount</strong></label>
                                            <input type="text" name="initial_amount" id="initial_amount" class="form-control" value="{{$people->initial_amount}}">
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                    <label for="type" class="form-label"><strong>Type</strong></label>
                                                    <select id="type" class="default-select form-control wide" name="type" value="{{$people->type}}">
                                                        <option value="0" selected>Choose...</option>
                                                        <option value="1" @if($people->type == 1) selected @endif>Debitors</option>
                                                        <option value="2" @if($people->type == 2) selected @endif>Creditors</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="note"><strong>Note || Address </strong></label>
                                                <textarea class="form-control" name="note" id="note" rows="3" >{{$people->note}}</textarea>
                                            </div>
                                        </div>  
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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