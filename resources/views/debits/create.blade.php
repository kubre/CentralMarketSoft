@extends('layouts.user')

@section('content')

<div class="container panel panel-default">

    @include('layouts.messages')

    <div class="panel-heading">
        <h4>Issue Debt. to Farmer</h4> 
    </div>
    <div class="panel-body">

        <form class="form-horizontal" action="/debit" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                <label for="identity" class="col-md-4 control-label">Addhar/PAN</label>

                <div class="col-md-6">
                    <input id="identity" type="text" class="form-control" name="identity" value="{{ old('identity') }}" required
                        autofocus>

                    @if ($errors->has('identity'))
                    <span class="help-block">
                        <strong>{{ $errors->first('identity') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="amount" class="col-md-4 control-label">Amount</label>

                <div class="col-md-6">
                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>

                    @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            
            <hr>

            <div class="row">
                <button type="submit" class="btn btn-success col-md-6 col-md-offset-4">Issue</button>
            </div>

        </form>
    </div>
</div>

@endsection