@extends('layouts.user')

@section('content')

<div class="container panel panel-default">

    @include('layouts.messages')

    <div class="panel-heading">
        <h4>Edit Debt. for {{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }}</h4>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" action="/debit/{{ $debt->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}


            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="identity" class="col-md-4 control-label">Addhar/Pan</label>

                <div class="col-md-6">

                    <input id="identity" readonly type="text" class="form-control" name="identity" value="{{ $debt->farmer->aadhar }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="amount" class="col-md-4 control-label">New Amount</label>

                <div class="col-md-6">
                    <input id="amount" type="text" class="form-control" name="amount" value="{{ $debt->amount }}"
                        required autofocus>

                    @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
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