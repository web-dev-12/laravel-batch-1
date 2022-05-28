@extends('layout.master')
@section('title','People List')
@push('styles')
    <!-- Datatable -->
    <link href="{{asset('/')}}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">People List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Due Amount</th>
                            <th>Type</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peoples as $people)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$people->p_name}}</td>
                            <td>{{$people->phone}}</td>
                            <td>{{$people->due_amount}}</td>
                            <td>{{$people->type}}</td>
                            <td>{{$people->note}}</td>
                            <td>
                                @if($people->status ==1)
                                <span class="badge light badge-success">
                                    <i class="fa fa-circle text-success me-1"></i>
                                    Active
                                </span>
                                @else
                                <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger me-1"></i>
                                   Inactive
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route(currentUser().'.people.edit',$people->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route(currentUser().'.people.destroy',$people->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
</div>
@push('scripts')
    <!-- Datatable -->
    <script src="{{asset('/')}}assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/js/plugins-init/datatables.init.js"></script>
@endpush
@endsection