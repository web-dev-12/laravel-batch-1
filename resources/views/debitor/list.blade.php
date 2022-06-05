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
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Initial Due Amount</th>
                            <th>Last Installment</th>
                            <th>Current Due Amount</th>
                            <th>Type</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peoples as $people)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$people->p_name}}</td>
                            <td>{{$people->phone}}</td>
                            <td>{{$people->initial_amount}}</td>
                            <td>{{$people->last_installment}}</td>
                            <td>{{$people->current_due}}</td>
                            <td>Debitors</td>
                            <td>{{$people->note}}</td>
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