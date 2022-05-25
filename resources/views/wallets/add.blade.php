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
                                    <form method="post" action="{{route(currentUser().'.wallet.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="wallet_name" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Select Wallet Type</label>
                                                <select id="" class="default-select form-control wide wallet_type" name="wallet_type">
                                                    <option selected="">Choose...</option>
                                                    @if(!in_array(1,$wallet))
                                                    <option value="1">Cash|Moneybag</option>
                                                    @endif
                                                    <option value="2">Bank</option>
                                                    <option value="3">Mobile Banking</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Amount</label>
                                                <input type="text" name="amount" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4 bank">
                                                <label class="form-label">Select Bank</label>
                                                <select id="" class="default-select form-control wide" name="bank_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($banks as $bank)
                                                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4 mobile_bank">
                                                <label class="form-label">Select Mobile Banking</label>
                                                <select id="" class="default-select form-control wide" name="mobile_bank_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($mobile_bankings as $mbk)
                                                    <option value="{{$mbk->id}}">{{$mbk->mbk_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Add Wallet</button>
                                    </form>
                                </div>
                            </div>
                        </div>

@push('scripts')
    <script>
    $(document).ready(function() {
        $('.bank').hide();
        $('.mobile_bank').hide();
        $('.wallet_type').on('change', function() {
            var wallet_id = $(this).val();
            if(wallet_id) {
                //console.log(typeof(wallet_id));
                if(wallet_id == "1"){
                    $('.bank').hide();
                    $('.mobile_bank').hide();
                }else if(wallet_id == "2"){
                    $('.bank').show();
                    $('.mobile_bank').hide();
                }else if(wallet_id == "3"){
                    $('.mobile_bank').show();
                    $('.bank').hide();
                }
            }
        })
    });
    </script>
@endpush					
@endsection