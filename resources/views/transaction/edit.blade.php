@extends('layout.master')
@section('title','Edit Income Transaction')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Income Transaction</h4>
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
                                    <form method="post" action="{{route(currentUser().'.transaction.update',$transaction->id)}}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6 income">
                                                <label for="in_cat" class="form-label"><strong>Select Income</strong></label>
                                                <select id="in_cat" class="default-select form-control wide" name="in_cat">
                                                    <option value="0">Choose...</option>
                                                    @forelse($all_income_cat as $income)
                                                    <option value="{{$income->id}}" @if($income->id == $transaction->in_cat) selected @endif>{{$income->income_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">    
                                            <div class="mb-3 col-md-6">
                                                <label for="source_id" class="form-label"><strong>Select Medium</strong></label>
                                                <select id="source_id" class="form-control wide wallet_type" name="source_id">
                                                    <option value="0"><strong>Choose.....</strong></option>
                                                    <option value="1" @if($transaction->source_id ==1) selected @endif>Cash|MoneyBag</option>
                                                    <option value="2" @if($transaction->source_id ==2) selected @endif>Bank</option>
                                                    <option value="3" @if($transaction->source_id ==3) selected @endif>Mobile Banking</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6 bank">
                                                <label for="source_bank_cat_id" class="form-label"><strong>Select Bank</strong></label>
                                                <select id="source_bank_cat_id" class="form-control wide" name="source_bank_cat_id">
                                                    <option value="">Choose...</option>
                                                    @forelse($banks as $bank)
                                                    <option value="{{$bank->id}}" @if($bank->id == $transaction->source_cat_id) selected @endif>{{$bank->bank_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6 mobile_bank">
                                                <label for="source_mbk_cat_id" class="form-label"><strong>Select Mobile Banking</strong></label>
                                                <select id="source_mbk_cat_id" class="form-control wide" name="source_mbk_cat_id">
                                                    <option value="">Choose...</option>
                                                    @forelse($mobile_bankings as $mbk)
                                                    <option value="{{$mbk->id}}" @if($mbk->id == $transaction->source_cat_id) selected @endif>{{$mbk->mbk_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="people_id" class="form-label"><strong>Select People if Applicable</strong></label>
                                                <select id="people_id" class="default-select form-control wide" name="people_id">
                                                    <option value="">Choose...</option>
                                                    @forelse($peoples as $people)
                                                    <option value="{{$people->id}}" @if($people->id == $transaction->people_id) selected @endif>{{$people->p_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="note"><strong>Note</strong></label>
                                                <textarea class="form-control" name="note" id="note" rows="3">{{$transaction->note}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="amount" class="form-label"><strong>Amount</strong></label>
                                                <input type="text" name="amount" class="form-control" value="{{$transaction->amount}}">
                                            </div>
                                        </div> 
                                        <div class="mb-3 col-md-6">
                                            <label for="trans_date" class="form-label"><strong>Transaction Date:</strong></label>
                                            <input type="date" class="form-control" id="trans_date" name="trans_date" rows="3" value="{{$transaction->trans_date}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Add Transaction</button>
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