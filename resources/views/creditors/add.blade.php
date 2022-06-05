@extends('layout.master')
@section('title','Add Creditor')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Creditor</h4>
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
                                    <form method="post" action="{{route(currentUser().'.creditor.store')}}">
                                        @csrf
                                        
                                      
                                    
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                    <label for="type" class="form-label"><strong>Creditor Name</strong></label>
                                                    <select id="type" class=" form-control wide" name="creditor_id">
                                                        <option value="">Choose...</option>
                                                        @forelse($creditors as $creditor)
                                                        <option value="{{$creditor_people->id}}">{{$creditor->p_name}}</option>
                                                        @empty
                                                    @endforelse
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="amount" class="mb-1"><strong>Amount</strong></label>
                                            <input type="text" name="amount" id="due_amount" class="form-control">
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