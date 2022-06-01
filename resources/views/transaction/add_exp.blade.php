@extends('layout.master')
@section('title','Add Transaction')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Transaction</h4>
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
                                    <form method="post" action="{{route(currentUser().'.transaction.store')}}">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="mb-3 col-md-6 expense">
                                                <label for="exp_cat" class="form-label"><strong>Select Expense</strong></label>
                                                <select id="exp_cat" class="default-select form-control wide" name="exp_cat">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($all_exp_cat as $expense)
                                                    <option value="{{$expense->id}}">{{$expense->expense_cat}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">    
                                            <div class="mb-3 col-md-6">
                                                <label for="source_id" class="form-label"><strong>Select Medium</strong></label>
                                                <select id="source_id" class="default-select form-control wide wallet_type" name="source_id">
                                                    <option value="0" selected><strong>Choose.....</strong></option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">Mobile Banking</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6 bank">
                                                <label for="source_cat_id" class="form-label"><strong>Select Bank</strong></label>
                                                <select id="source_cat_id" class="default-select form-control wide" name="source_cat_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($banks as $bank)
                                                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6 mobile_bank">
                                                <label for="source_cat_id" class="form-label"><strong>Select Mobile Banking</strong></label>
                                                <select id="source_cat_id" class="default-select form-control wide" name="source_cat_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($mobile_bankings as $mbk)
                                                    <option value="{{$mbk->id}}">{{$mbk->mbk_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="people_id" class="form-label"><strong>Select People if Applicable</strong></label>
                                                <select id="people_id" class="default-select form-control wide" name="people_id">
                                                    <option value="0" selected>Choose...</option>
                                                    @forelse($peoples as $people)
                                                    <option value="{{$people->id}}">{{$people->p_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="note"><strong>Note</strong></label>
                                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="amount" class="form-label"><strong>Amount</strong></label>
                                                <input type="text" name="amount" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="mb-3 col-md-6">
                                            <label for="trans_date" class="form-label"><strong>Transaction Date:</strong></label>
                                            <input type="date" class="form-control" id="trans_date" name="trans_date" rows="3">
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