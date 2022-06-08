@extends('layout.master')
@section('title','Report List')
@push('styles')
 <!-- Daterange picker -->
 <link href="{{asset('/')}}assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

@endpush
@section('content')
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Report List</h4>
                                <form action="{{route(currentUser().'.search')}}">
                                @csrf
                                <div class="col-xl-4 mb-3">
                                        <div class="example">
                                            <p class="mb-1">Search By Date</p>
                                            <input name="date_range" class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015-01/31/2015">
                                        </div>
                                    </div>
                                    <button type="submit">Seach</button>
                                </form>    
                               
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Kolor Tea Shirt For Man</td>
                                                <td><span class="badge badge-primary light">Sale</span>
                                                </td>
                                                <td>January 22</td>
                                                <td class="color-primary">$21.56</td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>Kolor Tea Shirt For Women</td>
                                                <td><span class="badge badge-success">Tax</span>
                                                </td>
                                                <td>January 30</td>
                                                <td class="color-success">$55.32</td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Blue Backpack For Baby</td>
                                                <td><span class="badge badge-danger">Extended</span>
                                                </td>
                                                <td>January 25</td>
                                                <td class="color-danger">$14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@push('scripts')
 <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{asset('/')}}assets/vendor/moment/moment.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
     <!-- Daterangepicker -->
     <script src="{{asset('/')}}assets/js/plugins-init/bs-daterange-picker-init.js"></script>
<script src="{{asset('/')}}assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

@endpush
@endsection