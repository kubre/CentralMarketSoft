@extends('layouts.user')

@section('content')

<div class="container panel panel-default">

    @include('layouts.messages')

    <div class="panel-heading row">
        <h4 class="col-md-8">Edit Debt. for {{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }}</h4>
        <span class="col-md-2 col-md-offset-2">
            <a class='btn btn-primary btn-block' style="margin-top: 5px" href='/debit/{{$debt->id}}'>View Details</a>
        </span>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" style="font-family: monospace !important" action="/debit/{{ $debt->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}


            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="identity" class="col-md-4 control-label">Addhar/PAN</label>

                <div class="col-md-6">

                    <input id="identity" readonly type="text" class="form-control" name="identity" value="{{ $debt->farmer->aadhar }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                <label for="comment" class="col-md-4 control-label">Comment</label>

                <div class="col-md-6">
                    <input id="comment" type="text" class="form-control" name="comment" maxlength="255" value="{{ $debt->comment or old('comment') }}">

                    @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <span class="help-block text-center">Comment is Optional.</span>

            <div class="row">
                <div class="col-sm-4">Old Amount</div>
                <div class="col-sm-5">Amount to Subtract</div>
                <div class="col-sm-3">New Amount</div>
            </div>
            <hr>

            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }} row">
                <div class="col-sm-3" style="font-weight: bold;font-size: 16px">
                    <input id="total-amount" class="form-control" readonly value="{{ $debt->amount }}">
                </div>
                <div class="col-sm-1" style="font-weight: bold;font-size: 16px;text-align:center">-</div>
                <div class="col-sm-4">
                    <input id="sub-amount" type="text" class="form-control" name="sub-amount" value="0"
                        required autofocus>

                    @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
                </div>
                <div  class="col-sm-1" style="font-weight: bold;font-size: 16px;text-align:center">=</div>
                <div class="col-sm-3" style="font-weight: bold">
                    <input class="form-control" id="read-amount" type="text" readonly>
                    <input id="amount" name="amount" type="hidden">
                </div>
            </div>

            <hr>

            <div class="row">
                <button type="submit" class="btn btn-success col-md-6 col-md-offset-4">Update</button>
            </div>

        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        calcAmount();

        function calcAmount() {
            var amount = parseFloat($('#total-amount').val()) - parseFloat($('#sub-amount').val());
            if(amount < 0 || isNaN(amount)) {
                $("button[type='submit']").attr('disabled', 'true');
            } else {
                $("button[type='submit']").removeAttr('disabled');
            }
            $('#amount').val(amount.toString());
            $('#read-amount').val(amount.toString());
        }

        $('#sub-amount').on('keyup', function() {
            calcAmount();
        });
    });
    </script>
@endsection