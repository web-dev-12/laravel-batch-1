@extends('layout.master')
@section('title','Income List')
@push('styles')
    <!-- Datatable -->
    <link href="{{asset('/')}}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Income List</h4>
    </div>
    <div class="card-body">
        <div class="table table-bordered">
            <table id="example3" class="display" style="min-width: 845px">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Income Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($incomes as $income)
                    @if($income->status == 1)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$income->income_name}}</td>
                    <td>
                        @if($income->status == 1)
                        <span class="badge light badge-success">
                            <i class="fa fa-circle text-success me-1"></i>
                            Active
                        </span>
                        @else
                        <span class="badge light badge-danger">
                            <i class="fa fa-circle text-danger me-1"></i>
                            InActive
                        </span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{route(currentUser().'.income.edit',$income->id)}}" class="btn btn-primary shadow btn-xs sharp me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form method="POST" action="{{route(currentUser().'.income.destroy',$income->id)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger shadow btn-xs sharp">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                        </td>
                    </tr>
                        @endif
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