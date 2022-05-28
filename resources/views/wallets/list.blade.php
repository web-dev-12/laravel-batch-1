@extends('layout.master')
@section('title','Wallet List')
@push('styles')
    <!-- Datatable -->
    <link href="{{asset('/')}}assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Wallet List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Mobile Bank</th>
                            <th>Bank</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($wallets as $wallet)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$wallet->wallet_name}}</td>
                            <td>
                                @if($wallet->wallet_type==1)
                                Cash|Moneybag
                                @elseif($wallet->wallet_type==2)
                                Bank
                                @else
                                Mobile Banking
                                @endif
                            </td>
                            <td>{{$wallet->amount}}</td>
                            <td>{{optional($wallet->mobilebankings)->mbk_name}}</td>
                            <td>{{optional($wallet->banks)->bank_name}}</td>
                            <td>
                                @if($wallet->status ==1)
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
                                    <a href="{{route(currentUser().'.wallet.edit',$wallet->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route(currentUser().'.wallet.destroy',$wallet->id)}}" method="POST">
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