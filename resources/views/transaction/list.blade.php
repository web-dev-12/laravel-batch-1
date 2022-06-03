@extends('layout.master')
@section('title','Transaction List')
@push('styles')
    <!-- Datatable -->
    <link href="{{asset('/')}}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Transaction List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table id="example3" class="display text-center" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Date</th>
                            <th>Income Category</th>
                            <th>Expense Category</th>
                            <th>Medium</th>
                            <th>Bank || Mobile Bank Name</th>
                            <th>People</th>
                            <th>Old Amount</th>
                            <th>Income/Expense Amount</th>
                            <th> New Amount</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$transaction->trans_date}}</td>
                            <td>{{optional($transaction->incomes)->income_name}}</td>
                            <td>{{optional($transaction->expenses)->expense_cat}}</td>
                            <td>
                                @if($transaction->source_id==1)
                                Cash | Moneybag
                                @elseif($transaction->source_id==2)
                                Bank
                                @elseif($transaction->source_id==3)
                                Mobile Bank
                                @endif
                            </td>
                            <td>@if($transaction->source_id==2)
                                {{optional($transaction->banks)->bank_name}}
                                @elseif($transaction->source_id==3)
                                {{optional($transaction->mobilebankings)->mbk_name}}
                                @endif
                            </td>
                            <td>
                                {{optional($transaction->peoples)->p_name}}
                            </td>
                            <td>{{$transaction->old_bal}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->new_bal}}</td>
                            <td>{{$transaction->note}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route(currentUser().'.transaction.edit',$transaction->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route(currentUser().'.transaction.destroy',$transaction->id)}}" method="POST">
                                    @method('DELETE')    
                                    @csrf
                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                    </form>
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