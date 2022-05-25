@extends('layout.master')
@section('content')
@php
//print_r($wallet->toArray());
@endphp
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Wallet</h4>
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
                                    <form method="post" action="{{route(currentUser().'.wallet.update',$wallet->id)}}">
                                    @method('PUT')
                                    @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="wallet_name" class="form-control" value="{{$wallet->wallet_name}}">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Select Wallet Type</label>
                                                <select id="" class="default-select form-control wide wallet_type" name="wallet_type">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="1" @if($wallet->wallet_type == 1) selected @endif>Cash|Moneybag</option>
                                                    <option value="2" @if($wallet->wallet_type == 2) selected @endif>Bank</option>
                                                    <option value="3" @if($wallet->wallet_type == 3) selected @endif>Mobile Banking</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Amount</label>
                                                <input type="text" name="amount" class="form-control" value="{{$wallet->amount}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4 bank">
                                                <label class="form-label">Select Bank</label>
                                                <select id="" class="default-select form-control wide" name="bank_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($banks as $bank)
                                                    <option value="{{$bank->id}}" @if($wallet->bank_id == $bank->id) selected @endif>{{$bank->bank_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4 mobile_bank">
                                                <label class="form-label">Select Mobile Banking</label>
                                                <select id="" class="default-select form-control wide" name="mobile_bank_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($mobile_bankings as $mbk)
                                                    <option value="{{$mbk->id}}" @if($wallet->mobile_bank_id == $mbk->id) selected @endif>{{$mbk->mbk_name}}</option>
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
        $('[name=wallet_type]').attr('disabled', true);
        var wallet_id = {{$wallet->wallet_type}};
        wallet(wallet_id);
        $('.wallet_type').on('change', function() {
            wallet_id = $(this).val();
            wallet(wallet_id);
        });
        function wallet(wallet_id){
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
        }
    });
    </script>
@endpush					
@endsection