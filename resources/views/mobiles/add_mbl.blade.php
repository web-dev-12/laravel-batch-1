@extends('layout.master')
@section('title','Add Wallet')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Wallet</h4>
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
                                    <form method="post" action="{{route(currentUser().'.mobilebanking.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Mobile Bank Name</label>
                                                <input type="text" name="mbk_name" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">Add Mobile bank</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					
@endsection