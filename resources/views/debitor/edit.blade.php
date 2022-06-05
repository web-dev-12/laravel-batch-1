@extends('layout.master')
@section('title','Update Debitor')
@section('content')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Debitor</h4>
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
                                    <form autocomplete="off" method="post" action="{{route(currentUser().'.debitor.update', $people->id)}}">
                                        @method('PUT')    
                                        @csrf
                                        <div class="mb-3">
                                            <label for="p_name" class="mb-1"><strong>Name</strong></label>
                                            <input type="text" name="p_name" id="p_name" class="form-control" readonly value="{{$people->p_name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="mb-1"><strong>Contact No</strong></label>
                                            <input type="text" name="phone" id="phone" class="form-control" readonly value="{{$people->phone}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="current_due" class="mb-1"><strong>Due Amount</strong></label>
                                            <input type="text" name="current_due" id="current_due" class="form-control" readonly value="{{$people->current_due}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="last_installment" class="mb-1"><strong>This Installment</strong></label>
                                            <input type="text" name="last_installment" id="last_installment" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="due" class="mb-1"><strong>Due after this Installment</strong></label>
                                            <input type="text" name="due" id="due" readonly class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="mb-1"><strong>Type</strong></label>
                                            <input type="text" name="" id="" class="form-control" readonly placeholder="Debitors">
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="note"><strong>Note || Address </strong></label>
                                                <textarea class="form-control" name="note" id="note" rows="3"  readonly>{{$people->note}}</textarea>
                                            </div>
                                        </div>  
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

@push('scripts')
<script>	
    $(document).ready(function(){
        $('#last_installment').on('input',function() {
            var fnum = parseFloat($('#current_due').val());
            var lnum = parseFloat($('#last_installment').val());
            $('#due').val((fnum - lnum ? fnum - lnum : 0).toFixed(2));
        });
    })
</script>
@endpush					
@endsection