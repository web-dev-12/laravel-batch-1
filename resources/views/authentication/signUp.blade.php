@extends('layout.auth')
@section('title',"Wallet Registration")
@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('registration')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="mb-1"><strong>Name</strong></label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="mb-1"><strong>Username</strong></label>
                                            <input type="text" name="username" id="username" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="mb-1"><strong>Email</strong></label>
                                            <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobileNumber" class="mb-1"><strong>Mobile Number</strong></label>
                                            <input type="text" name="mobileNumber" id="mobileNumber" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirm" class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection