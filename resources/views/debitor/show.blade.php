@extends('layout.master')
@section('title','Debitors List')
@push('styles')
    <!-- Datatable -->
    <link href="{{asset('/')}}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Debitors List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Enter an Installment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peoples as $people)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$people->p_name}}</td>
                            <td><a href="{{route(currentUser().'.debitor.edit',$people->id)}}"><i class="fas fa-money-check-alt fa-2x"></i></a></td>
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